@extends('layout')

@section('title')
    Quản lý tài liệu
@endsection

@section('content')
    <style>
        th {
            text-align: center;
        }
    </style>
    <h2 class="text-success"><b>Quản lý tài liệu</b></h2>
    <div class="container-fluid">
        <table class="table table-striped
  table-hover table-bordered" style="font-size:medium">
            <thead>
                <tr>
                    <th scope="col">Mã số tài liệu</th>
                    <th scope="col">Tên tài liệu</th>
                    <th scope="col">Người tải lên</th>
                    <th scope="col">Loại tài liệu</th>
                    <th scope="col">Thời gian tải lên</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($document as $d)
                    <tr>
                        <th scope="row">{{ $d->documentId }}</th>
                        <td style="text-align:left">{{ $d->documentName }}</td>
                        <td>{{ $d->name }}</td>

                        @if ($d->typeId == 1)
                            <td>DOCX</td>
                        @elseif($d->typeId == 2)
                            <td>DOC</td>
                        @elseif($d->typeId == 3)
                            <td>PDF</td>
                        @elseif($d->typeId == 4)
                            <td>XLSX</td>
                        @elseif($d->typeId == 5)
                            <td>XLS</td>
                        @elseif($d->typeId == 6)
                            <td>PPTX</td>
                        @elseif($d->typeId == 7)
                            <td>PPT</td>
                        @else
                            <td>TXT</td>
                        @endif

                        <td>{{ $d->created_at }}</td>
                        <td>
                            <a href="{{ route('deleteDocument', ['documentId' => $d->documentId]) }}"
                                onclick="return confirm('Xóa tài liệu này?');">
                                <button type="button" class="btn btn-danger">
                                    <!--kich hoat hop thoai xac nhan xoa-->
                                    Xóa tài liệu
                                </button>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@stop
