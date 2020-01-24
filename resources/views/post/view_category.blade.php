
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
                    <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
                </p>
                <hr>
                <div>
                    <ol>
                        <li>Category Name: {{$category->name}}</li>
                        <li>Slug Name: {{$category->slug}}</li>
                        <li>Created At: {{$category->created_at}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection


