@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12  mx-auto">
                <a href="{{route('student')}}" class="btn btn-info">Add Student</a>

                <hr>
                <table class="table table-responsive">
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Phone </th>
                        <th>Action</th>
                    </tr>
                    @foreach($student as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>

                                <a href="{{ URL::to('edit/student/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ URL::to('delete/student/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                <a href="{{ URL::to('view/student/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection

