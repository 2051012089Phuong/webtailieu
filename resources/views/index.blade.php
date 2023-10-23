@extends('layout')

@section('title')
    Trang chủ
@endsection

@section('content')
    <h2 class="text-success"><b>Trang chủ</b></h2>
    <div class="grid-container" style="background-image:url({{ url('images/bg.jpg') }});">
        @if ($document->isEmpty())
            <br>
            <h4>Chưa có tài liệu nào được đăng tải.</h4>
        @else
            @foreach ($document as $document)
                <div class="grid-item addtextdiv" style="font-size: medium">
                    <div class="cut-text">
                        <a href="{{ route('docs-detail', ['documentId' => $document->documentId]) }}">
                            {{ $document->documentName }}
                        </a>
                    </div>
                    <br>

                    <a href="{{ route('docs-detail', ['documentId' => $document->documentId]) }}">
                        <img src="images/{{ $document->image }}" height="200" width="200">
                    </a>
                    <br>
                    <div class="cut-text" style="padding-top:5%">
                        {{-- Người tải lên: {{ $d->id }} --}}
                        Người tải lên: {{ $document->name }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    

    
@stop
