@extends('layout')

@section('title')
Tải lên tài liệu
@endsection

@section('content')

<h2 class="text-success"><b>Tải lên tài liệu</b></h2>
<div class="container" style="width:33%"></div>
<div class="container-fluid addtextdiv" style="width:34%;">
   
        <form method="POST" action="{{route('insertDocument')}}" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
        <!--xem chuc nang validateForm o file -->

            @csrf

            <div class="form-group container-fluid">
                <label for="docname">Tên hiển thị cho tài liệu</label>
                <input type="text" name="docname" id="docname" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">
                Không bắt buộc, sẽ lấy tên tài liệu làm tên hiển thị nếu bỏ trống.
                </small>
            </div>

            

            {{--<div class="form-group">
                <label for="doctype">Loai tai lieu (tam)</label>
                <select class="form-control" name="doctype" id="doctype">
                @foreach($docType as $d)
                <option value="{{$d->typeId}}">{{$d->fileType}}</option>
                @endforeach
                </select>
            </div>-->--}}

            {{-- <div class="form-group container-fluid">
                <label for="docname">Ten nguoi dang tai (tam)</label>
                <input type="number" name="id" id="id" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">
                Se bo khi lam trang login (lay nguoi dung hien tai)
                </small>
            </div> --}}
            
            <div class="form-group container-fluid">
                <label for="doctype">Tải lên tài liệu</label>
                <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">
                Kích thước tối đa 200MB.
                </small>
            </div>

            <div class="form-group container-fluid">
            <button style="cursor:pointer" class="btn btn-success btn-outline-success" type="submit">
            Tải lên</button>
            
            <button style="cursor:pointer" class="btn btn-danger btn-outline-danger" type="reset">
            Hủy</button>
            </div>

        </form>
</div>

<div class="container" style="width:33%"></div>

<script>

function validateForm() {
  if( document.getElementById("fileUpload").files.length == 0 ){
    alert("Chưa upload file!");
    return false;
}
}
</script>

@stop