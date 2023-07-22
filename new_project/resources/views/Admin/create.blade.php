@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <h1>Create Post</h1>
    <form action="{{route('admin.store')}}" method="post" class="needs-validation" novalidate
    enctype="multipart/form-data">
      @csrf
  <!-- title part -->
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <!--end of title part -->
  <!-- image part -->
  <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" name="image">
    @error('image')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <!--end image part -->
  <!--description part -->
  <div class="form-group">
    <label for="desc">description:</label>
        <textarea name="description" id="desc" class="form-control" placeholder="description" cols="30" rows="10"></textarea>
        @error('description')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <!-- end of description part -->

  <button type="submit" class="btn btn-primary">save</button>
</form>



    </div>
</div>
@endsection