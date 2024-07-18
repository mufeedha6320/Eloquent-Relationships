@extends('templates.header')
@section('content')
<div class="container p-3">
    <h3>Remove posts from the tag</h3>
    <p>
    </p>
        <div class="row py-3">
            <div class="col-md-7 p-3">
                <h4>Tag : {{$tag->tag_name}}</h4>
                <table class="table table-dark">
                    <thead>
                        <th>#</th>
                        <th>Posts</th>
                        <th>Detach</th>
                    </thead>
                    <tbody>
                        @foreach ($tag->myposts as $i)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$i->post_name}}</td>
                            <td><a href="{{route('detach.post', ['tagId' => $tag->id,'postId' => $i->id, ] )}}"><button class="btn btn-danger">Detach</button></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
</div>

@endsection
