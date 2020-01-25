@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($post as $row)
            <div class="post-preview">

                   <img src="{{URL::to($row->image)}}" style="height: 300px;">

                <h2 class="post-title">
                   <a href="{{ URL::to('view/post/'.$row->id) }}">{{$row->title}}</a>
                </h2>
                <p class="post-meta">Category:
                    {{$row->name}}
                    on Slug {{$row->slug}}</p>
            </div>
            @endforeach


            <!-- Pager -->
            <div class="clearfix">
                {{ $post->links() }}
            </div>
        </div>
    </div>
    @endsection
