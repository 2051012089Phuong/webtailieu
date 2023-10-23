@extends('layout')

@section('title')
    Thay đổi quyền hạn
@endsection

@section('content')
    <h2 class="text-info"><b>Thay đổi quyền hạn</b></h2>

    <div class="container" style="width:35%"></div>

    <div class="container-fluid addtextdiv" style="width:30%;">
        <div>
            <form action="role-update/{{ $users->id}}" method="POST">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Name -->
                <div class="form-group container-fluid">
                    <label for="name">Tên người dùng</label>
                    <input id="username" class="form-control" type="text" name="username" value="{{$users->name}}"
                        disabled>
                </div>

                <div class="form-group container-fluid">
                    <label>Thay đổi quyền hạn</label>
                    <select name="usertype" class="form-control" id="role">
                        <option selected disabled>Chọn quyền hạn</option> 
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>
                <div class="form-group container-fluid">

                    <button type="submit" class="btn btn-danger" onclick= "return confirm('Quyết định thay đổi quyền hạn của người dùng này?')">
                        <!--kich hoat hop thoai xac nhan xoa-->
                        Thay đổi
                    </button>
                    
                </div>
            </form>
        </div>
    </div>

    {{-- <script>
        function checkform() 
            {
                var ddl = document.getElementById("role");
                var selectedValue = ddl.options[ddl.selectedIndex].value;
                if (selectedValue == "0") {
                    alert("Chưa chọn quyền hạn!");
               else{
                    confirm("Quyết định thay đổi quyền hạn của người dùng này?");
                }
            }
        }
    </script> --}}

@stop
