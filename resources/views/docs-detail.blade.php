@extends('layout')

@section('title')
    Thông tin tài liệu
@endsection

@section('content')
    <h2 class="text-success"><b>Thông tin tài liệu</b></h2>
    <div class="container">
        <div class="container-fluid ">
            <div class="grid-item addtextdiv" style="width:45%; font-size:medium; word-break: break-all">
                <!--ten bien do document controller truyen qua-->
                <div class="docs-detail" style="text-align:left">
                    <span class="text-primary"><b>Mã số tài liệu:</b></span> {{ $doc->documentId }}<br>
                    <span class="text-primary"><b>Tên tài liệu:</b></span> {{ $doc->documentName }}<br>
                    <span class="text-primary"><b>Loại tài liệu:</b></span> {{ $extensionname }}<br>
                    <span class="text-primary"><b>Thời gian tải lên:</b></span> {{ $doc->created_at }}
                </div>
                <br>
                <img src="images/{{ $doc->image }}" height="200" width="200"><br>

                <div style="padding-top:5%">
                    <span class="text-primary"><b>Người tải lên:</b></span> {{ $doc->name }}
                </div><br>


                @if (!Auth::user())
                    <a href="{{ route('login') }}"
                        onclick="return confirm('Bạn cần đăng nhập để tải tài liệu. Bạn có muốn đăng nhập chứ?');">
                        <button style="cursor:pointer" class="btn btn-success btn-outline-success"><i
                                class="fa fa-download"></i> Tải xuống</button>
                    </a>
                @else
                    <a href="{{ URL::to('/') }}/documents/{{ $doc->documentFileName }}">
                        <button style="cursor:pointer" class="btn btn-success btn-outline-success"><i
                                class="fa fa-download"></i> Tải xuống</button>
                    </a>
                @endif

                <br>
            </div>


        </div>
    </div>
@stop
