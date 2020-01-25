
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{route('student')}}" class="btn btn-danger">Add Student</a>
                    <a href="{{route('all.student')}}" class="btn btn-info">All Student</a>
                </p>
                <hr>
                <div>
                    <ol>
                        <li>Student Name: {{$student->name}}</li>
                        <li>Student Email: {{$student->email}}</li>
                        <li>Student Phone: {{$student->phone}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection


