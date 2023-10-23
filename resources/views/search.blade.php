@extends('layout')

@section('title')
Tìm kiếm tài liệu
@endsection

@section('content')

@if($searchs->isNotEmpty())

<h2 class="text-success"><b>Kết quả tìm kiếm cho '{{$input}}'</b></h2>

<div class="grid-container" style="background-image:url({{url('images/bg.jpg')}});">

    @foreach ($searchs as $d)
      <div class="grid-item addtextdiv" style="font-size: medium">
        <div class="cut-text" >
          <a href="{{route('docs-detail',['documentId'=>$d->documentId])}}">{{ $d-> documentName}}</a>
        </div>
        <br>
        <a href="{{route('docs-detail',['documentId'=>$d->documentId])}}">
           <img src="images/{{$d->image}}" height="200" width="200">
        </a>
        <br>
        <div class="cut-text" style="padding-top:5%">
          Người tải lên: {{$d->name}}
        </div>
      </div>
    @endforeach

</div>

@else
<h2 class="text-danger"><b>Không có kết quả nào cho '{{$input}}'</b></h2>

@endif

@stop

  