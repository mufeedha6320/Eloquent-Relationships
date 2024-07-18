@extends('templates.header')
@section('content')
<div class="container p-3">


    <div class="row py-3">
        <h4>Many to many (Sorted by tag)</h4>
        <div class="col-md-12">
            <table class="table table-dark rounded">
                <thead>
                    <th>#</th>
                    <th>tag</th>
                    <th>posts</th>
                </thead>
                <tbody>
                    @foreach ($tags as $i)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{$i->tag_name}}</td>
                        <td>
                            <ul>
                            @foreach ($i->myposts as $post)
                                <li>{{$post->post_name}}</li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><hr>

</div>
@endsection
