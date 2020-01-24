@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
                    <a href="" class="btn btn-info">All Category</a>
                </p>
                <hr>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Tilte</label>
                            <input type="text" class="form-control" placeholder="post title" id="name" required>

                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>sdfg</option>
                                <option>fsdfsd</option>
                                <option>sdfg</option>
                                <option>fsdfsd</option>
                                <option>sdfg</option>
                                <option>fsdfsd</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Post Image</label>
                            <input type="file" class="form-control" placeholder="image" required>

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Details</label>
                            <textarea rows="5" class="form-control" placeholder="post details"  required ></textarea>

                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
