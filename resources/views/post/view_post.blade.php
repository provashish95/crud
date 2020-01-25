
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <a href="{{route('all.post')}}" class="btn btn-info">All Posts</a>
                <hr>
                <div>

                        <h2>{{$post->title}}</h2>
                        <img src="{{URL::to($post->image)}}" height="300px" >
                        <p>Category Name: {{$post->name}}</p>
                        <p>{{$post->details}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection


