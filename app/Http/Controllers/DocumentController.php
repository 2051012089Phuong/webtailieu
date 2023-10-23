<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Collection;


class DocumentController extends Controller
{
    public function index()
    {
        //lay het table document
        $document = Document::all();

        //lay 20 record trong table document de phan trang


        return view('index', compact('document'));
    }

    //phuong thuc lay thong tin tai lieu
    public function getDocumentDetail($docsId)
    {
        $doc = Document::where("documentId", $docsId)->first(); //lay thong tin cua document o hang do

        $extensionid = Document::where("documentId", $docsId)->value('typeId');
        $extensionname = DocumentType::where('typeId', $extensionid)->value('fileType');

        // $userid = Document::where("documentId", $docsId)->value('id');
        // $user = User::find($userid);

        //$encode=urlencode($doc->documentFileName);


        //tra ve view ten "document", tra bien xu ly "doc" ve trang
        return view('docs-detail', compact('doc', 'extensionname'));
    }

    //phuong thuc them tai lieu
    public function addDocument()
    {
        $docType = DocumentType::all();
        return view('add-document', compact('docType'));
    }

    //phuong thuc chen tai lieu vao db
    public function insertDocument(Request $request)
    {
        /*$this->validate($request,[
            'fileUpload'=>'required',
            'id'=>'required']);*/

        /*$this->validate($request,[
            'fileUpload' => 'required',
            'id' => 'required'
        ],
        [
            'fileUpload.required' => 'Chưa tải file lên!',
            'id.required' => 'Chưa nhập id!'
        ]);*/

        /*if($request->file('fileUpload')->isValid())
        {}*/
        //lay ten file vua upload vao db (khong tinh extension)

        //    $filename = $request->fileUpload->getClientOriginalName();

        $filename = pathinfo($request->file('fileUpload')->getClientOriginalName(), PATHINFO_FILENAME);
        $realfileextension = pathinfo($request->file('fileUpload')->getClientOriginalName(), PATHINFO_EXTENSION);

        //lay thoi gian hien tai de lam thanh phan ten tep (chong trung)

        $docname = $request->docname;

        if ($docname == NULL) {
            $docname = $filename;
        }

        $fileextension = strtoupper($request->fileUpload->getClientOriginalExtension()); //strtolower: chuan hoa extension ve dang CHU HOA
        //$request->fileUpload->move(public_path('images'),$filename);


        //sua ten filename vua upload trc khi chuyen vao folder
        $now = Carbon::now()->timestamp; //--> thoi gian trung voi luc tao record
        $newname = $now . $filename . "." . $realfileextension;

        //chuyen file vao folder bang ten moi
        $request->fileUpload->move(public_path('documents'), $newname);

        //lay thong tin id duoi mo rong tu bang document_type
        $extensionid = DocumentType::where('fileType', '=', $fileextension)->value('typeId');

        //tu dong chen ten hinh vao tai lieu tuong ung

        $imgname = "";
        switch ($extensionid) {
            case '1':
                $imgname = "word.png";
                break;
            case '2':
                $imgname = "word_old.png";
                break;
            case '3':
                $imgname = "pdf_icon.png";
                break;
            case '4':
                $imgname = "excel.png";
                break;
            case '5':
                $imgname = "excel_old.png";
                break;
            case '6':
                $imgname = "pp.png";
                break;
            case '7':
                $imgname = "pp_old.png";
                break;
            case '8':
                $imgname = "txt_icon.png";
                break;
        }

        //thao tac ghi vao db
        $document = Document::create([
            'documentName' => $docname,
            'documentFileName' => $newname,

            // 'id' => $request->id,
            'id' => Auth::user()->id,

            'typeId' => $extensionid,
            'image' => $imgname,
            'name' => Auth::user()->name

        ]);

        $document = Document::all();


        return view('index', compact('document', 'imgname'));
    }

    /*quan trong: config upload max filesize tai C:\xampp\php\php.ini,
    tim gia tri upload_max_filesize*/

    public function listDocument()
    {
        $document = Document::all();

        /*$documentid=Document::pluck('documentId');

        foreach($documentid as $d)
        {
            $doctypeid=Document::where('documentId','=',$d)->value('typeId')
            $typename=D
        }*/
        //$user = User::where('id','=', $document->id)->first();

        return view('admin.documentlist', compact('document'));
    }

    public function deleteDocument($documentid)
    {
        $record = Document::where("documentId", $documentid)->first(); //lay thong tin cua document o hang do

        if (file_exists(public_path("documents/" . $record->documentFileName))) {
            //xoa file tuong ung trong thu muc
            File::delete($record->documentFileName);
            unlink(public_path("documents/" . $record->documentFileName));
        }
        //xoa record trong db
        Document::where('documentId', $documentid)->delete();

        $document = Document::all();
        return view('admin.documentlist', compact('document'));
    }

    public function searchDocument(Request $request)
    {
        $input = $request->search;
        if ($request->search) //neu nhu co dl trong truong search
        {
            $searchs = Document::where('documentName', 'LIKE', '%' . $request->search . '%')->get(); //lay ten tai lieu (documentName)

            if ($searchs->isEmpty()) {
                $searchs = Document::where('documentId', '=', $request->search)->get(); //lay id tai lieu (documentId)

                // if ($searchs->isEmpty()) {
                //     $searchs = Document::where('id', '=', $request->search)->get(); //lay user tai lieu (id)
                    if ($searchs->isEmpty()) {
                        $upperex = strtoupper($request->search); //lay loai tai lieu (typeId)
                        $extensionId = -1;
                        switch ($upperex) {
                            case 'DOCX':
                                $extensionId = 1;
                                break;
                            case 'DOC':
                                $extensionId = 2;
                                break;
                            case 'PDF':
                                $extensionId = 3;
                                break;
                            case 'XLSX':
                                $extensionId = 4;
                                break;
                            case 'XLS':
                                $extensionId = 5;
                                break;
                            case 'PPTX':
                                $extensionId = 6;
                                break;
                            case 'PPT':
                                $extensionId = 7;
                                break;
                            case 'TXT':
                                $extensionId = 8;
                                break;
                        }

                        $searchs = Document::where('typeId', '=', $extensionId)->get();
                    }
                //}
            }

        } else {
            return redirect()->back();
        }

        /*$searchs1 = Document::where('documentName', 'LIKE', '%' . $request->search . '%')->get(); //lay ten tai lieu (documentName)
        $searchs2 = Document::where('documentId', '=', $request->search)->get(); //lay id tai lieu (documentId)
        $searchs3=Document::where('id','=',$request->search)->get(); //lay user tai lieu (id)
        $upperex = strtoupper($request->search); //lay loai tai lieu (typeId)
        $extensionId = -1;
        switch ($upperex) {
            case 'DOCX':
                $extensionId = 1;
                break;
            case 'DOC':
                $extensionId = 2;
                break;
            case 'PDF':
                $extensionId = 3;
                break;
            case 'XLSX':
                $extensionId = 4;
                break;
            case 'XLS':
                $extensionId = 5;
                break;
            case 'PPTX':
                $extensionId = 6;
                break;
            case 'PPT':
                $extensionId = 7;
                break;
            case 'TXT':
                $extensionId = 8;
                break;
        }

        $searchs4 = Document::where('typeId', '=', $extensionId)->get();
        */

        return view('search', compact('searchs', 'input'));
    }

    public function listUser()
    {
        $users = User::all();

        /*$documentid=Document::pluck('documentId');

        foreach($documentid as $d)
        {
            $doctypeid=Document::where('documentId','=',$d)->value('typeId')
            $typename=D
        }*/

        return view('admin.userlist', compact('users'));
    }

    public function userListDocument()
    {
        $document = Document::where('name', '=', Auth::user()->name)->get();

        /*$documentid=Document::pluck('documentId');

        foreach($documentid as $d)
        {
            $doctypeid=Document::where('documentId','=',$d)->value('typeId')
            $typename=D
        }*/
        //$user = User::where('id','=', $document->id)->first();
        return view('user-documentlist', compact('document'));
    }

    public function userDeleteDocument($documentid)
    {
        // if ($documentid != Document::where("id", Auth::user()->id)->value('documentId')) {
        //     return view('401-unauthorized');
        // }

        // else
        {
            $record = Document::where("documentId", $documentid)->first(); //lay thong tin cua document o hang do
            if (file_exists(public_path("documents/" . $record->documentFileName))) {
                //xoa file tuong ung trong thu muc
                File::delete($record->documentFileName);
                unlink(public_path("documents/" . $record->documentFileName));
            }
            //xoa record trong db
            Document::where('documentId', $documentid)->delete();

            $document = Document::where('name', '=', Auth::user()->name)->get();
            return view('user-documentlist', compact('document'));
        }
    }

    // public function userDeleteDocument($documentid)
    // public function userDeleteDocument(Request $request)
    // {
    //     $a=$request;
    //     // if ($documentid != Document::where("id", Auth::user()->id)->value('documentId')) {
    //     //     return view('401-unauthorized');
    //     // }

    //     // $documentname=Document::where("id", $documentid)->value('documentName');
    //     // if ($documentid != Document::where("id", Auth::user()->id)->value('documentId')) {
    //     //     // return view('401-unauthorized');
    //     //     echo Auth::user()->id.'||'.$documentid.'||'.Document::where("id", Auth::user()->id)->value('documentFileName');
    //     // }
    //     // else
    //     {
    //         $record = Document::where("documentId", $a)->first(); //lay thong tin cua document o hang do
    //         if (file_exists(public_path("documents/" . $record->documentFileName))) {
    //             //xoa file tuong ung trong thu muc
    //             File::delete($record->documentFileName);
    //             unlink(public_path("documents/" . $record->documentFileName));
    //         }
    //         //xoa record trong db
    //         Document::where('documentId', $a)->delete();

    //         $document = Document::where('name', '=', Auth::user()->name)->get();
    //         return view('user-documentlist', compact('document'));
    //     }
    // }

}