@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12  mx-auto">
                <a href="{{URL::to('student/create')}}" class="btn btn-info">Add Student</a>

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

                                <a href="{{ URL::to('student/'.$row->id.'/edit') }}" class="btn btn-sm btn-info">Edit</a>

                                <form action="{{url('student/'.$row->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

{{--                                <a href="{{ URL::to('student/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>--}}
                                <a href="{{ URL::to('student/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection

