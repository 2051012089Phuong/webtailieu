<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\DocumentType;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;
            if($usertype=='user' || $usertype=='admin')
            {
                // return view('user.userhome', compact('document'));
                $document = Document::all();
                return view('index', compact('document'));
            }
            // else if ($usertype=='admin')
            // {
            //     return view('index',compact('document'));
            // }
            // else
            // {
            //     //return redirect()->back();
            //     return view('index', compact('document'));
            // }
            else
            {
                Auth::logout();
                return redirect('suspended-login');
            }
        }
    }

    // public function post()
    // {
    //     return view ('post');
    // }

    public function editRole(Request $request,$id)
    {
        $users=User::findOrFail($id);
        return view('admin.edit-role')->with('users',$users);
    }
    public function roleUpdate(Request $request,$id)
    {
        $users=User::find($id);

        // $users->name=$request->input('username');
        $users->usertype=$request->input('usertype');
        $users->update();

        return redirect('/userlist')->with('success');
    }

    

}
