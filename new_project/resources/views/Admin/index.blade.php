@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
    <h1 class="text-center m-4">Admin</h1>
        <a href="{{route('admin.create')}}" class="btn btn-info mb-4">create post</a>
        <table class="table table-bordered-dark ">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <a href="{{route('delete',['id'=>$post->id])}}" class="btn btn-danger m-2">Delete</a> <br>
                            <a href="{{route('admin.edit',['admin'=>$post->id])}}" class="btn btn-info m-2">Edit</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
@endsection