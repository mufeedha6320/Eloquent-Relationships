@extends('templates.header')
@section('content')
<div class="container p-3">


    <div class="row py-3">
        <h4>Many to many (Sorted by post)</h4>
        <div class="col-md-12">
            <table class="table table-dark rounded">
                <thead>
                    <th>#</th>
                    <th>posts</th>
                    <th>tags</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($myposts as $i)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td> {{$i->post_name}}</td>
                        <td>
                            @foreach ($i->tags as $tag)
                            {{$tag->tag_name}},
                            @endforeach
                        </td>
                        <td><a href="{{  route('edit.post', $i->id)}}"> <button class="btn btn-secondary"> Update Post - Tags</button></a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div><hr>

</div>
@endsection
