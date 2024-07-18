@extends('templates.header')
@section('content')
<div class="container p-3">
    <h3>Remove tags from the post</h3>
    <p>
    </p>
        <div class="row py-3">
            <div class="col-md-7 border rounded shadow p-3">
                <h4>Post : {{$mypost->post_name}}</h4>
                <table class="table table-dark">
                    <thead>
                        <th>#</th>
                        <th>Tags</th>
                        <th>Detach</th>
                    </thead>
                    <tbody>
                        @foreach ($mypost->tags as $i)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$i->tag_name}}</td>
                            <td><a href="{{route('detach.tag', ['postId' => $mypost->id, 'tagId' => $i->id] )}}"><button class="btn btn-danger">Detach</button></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
</div>

@endsection
