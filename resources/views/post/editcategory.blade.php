@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{URL::to('category/create')}}" class="btn btn-danger">Add Category</a>
                    <a href="{{URL::to('category')}}" class="btn btn-info">All Category</a>
                </p>
                <hr>
                <!-- Error message here for validation --> <!-- Error message here for validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- Error message here for validation --> <!-- Error message here for validation -->
                <form action="{{URL::to('category/'.$category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{$category->name}}" name="name" >

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Slug Name</label>
                            <input type="text" class="form-control" value="{{$category->slug}}" name="slug" >

                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

