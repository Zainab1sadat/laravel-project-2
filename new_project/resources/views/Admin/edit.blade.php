@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <h1>Edit Post</h1>
    <form action="{{route('admin.update',['admin'=>$post->id])}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
      @csrf
      @method('PUT')
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" value="{{$post->title}}" id="title" placeholder="Enter Title" name="title" required>
    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
   <!-- image part -->
   <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" name="image">
    @error('image')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <!--end image part -->
  <div class="form-group">
    <label for="desc">description:</label>
        <textarea name="description" id="desc" class="form-control" placeholder="description" cols="30" rows="10">{{$post->description}}</textarea>
        @error('description')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">save</button>
</form>



    </div>
</div>
@endsection