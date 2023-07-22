@extends('layout.app')

@section('content')
<div class="row">
  <div class="col-md-6 mx-auto">
      <h1 class="text-center m-4">Post</h1>
      @foreach($posts as $post)
        <div class="card mb-5" >
          <img class="card-img-top" src="{{asset('upload/'.$post->image)}}" alt="Card image">
          <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{$post->description}}</p>
            <a href="#" class="btn btn-primary">Show</a>
          </div>
        </div>

      @endforeach

    </div>
</div>

@endsection

