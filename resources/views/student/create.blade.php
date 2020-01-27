@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{URL::to('student')}}" class="btn btn-info">All Student</a>
                </p>
                <hr><br>
                <h2 style="color: #7abaff">New Student Insert</h2>
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
                <form action="{{URL::to('student')}}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Student Name</label>
                            <input type="text" class="form-control" placeholder="Student Name" name="name" >

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Student Email</label>
                            <input type="email" class="form-control" placeholder="Student Email" name="email" >

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Student Phone</label>
                            <input type="number" class="form-control" placeholder="Student Phone" name="phone" >

                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


