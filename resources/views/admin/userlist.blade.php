@extends('layout')

@section('title')
    Quản lý người dùng
@endsection

@section('content')

@if(session('status'))
    <script>alert('Cập nhật thành công!');</script> 
@endif

    <style>
        th {
            text-align: center;
        }
    </style>
    <h2 class="text-success"><b>Quản lý người dùng</b></h2>
    <div class="container-fluid">
        <table class="table table-striped
  table-hover table-bordered" style="font-size:medium">
            <thead>
                <tr>
                    <th scope="col">Mã số người dùng</th>
                    <th scope="col">Tên người dùng</th>
                    {{-- <th scope="col">Email</th> --}}
                    <th scope="col">Quyền hạn</th>
                    <th scope="col">Thay đổi quyền hạn</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <th scope="row">{{ $u->id }}</th>
                        <td style="text-align:left">{{ $u->name }}</td>
                        {{-- <td>{{ $u->email }}</td> --}}
                        <td>
                            @if(ucwords($u->usertype)=='Suspended')
                            <div style="background-color: rgb(255, 136, 136)">Suspended</div>
                            @else {{ucwords($u->usertype)}}
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('edit-role', ['id' => $u->id]) }}">
                                <button type="button" class="btn btn-primary" value="{{$u->name}}">
                                    Thay đổi
                                </button>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@stop
