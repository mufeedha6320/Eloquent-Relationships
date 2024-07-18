@extends('templates.header')
@section('content')
<div class=" p-3">
        <div class="row py-3">
            @if($myposts->isNotEmpty())
            <div class="col-md-7 ml-2">
                <table class="table shadow table-dark">
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
                            <td><a href="{{ route('edit.post',$i->id)}}" class="text-white">{{$i->post_name}}</a></td>
                            <td>
                                <ul>
                                @foreach ($i->tags as $tag)
                                    <li>{{$tag->tag_name}} : {{$tag->pivot->created_at}}</li>
                                @endforeach
                                </ul>
                            </td>


                            <td>
                                <a href="{{ route('destroy.post',$i->id)}}" onclick="return confirm('Are you sure you want to delete this post?')">
                                    <button class="btn btn-danger">DELETE</button></a>
                                <a href=""><button class="btn btn-secondary" disabled>EDIT</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="col-md-4 ml-2 border rounded-lg p-3 h-100 ">
                <h5 class="p-2">Add New Post</h5>
                <form action="{{route('save.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="postTitle">Post Title:</label>
                        <input list="posts" name="post" id="postTitle" class="form-control">
                        <datalist id="posts">
                            @foreach ($myposts as $i)
                                <option value="{{$i->post_name}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="postTitle">Tags :</label>
                        <div class="tagContainer">
                            <input list="tags" name="tags[]" id="tagTitle" class="form-control mb-2">
                            <datalist id="tags">
                                @foreach ($tags as $i)
                                    <option value={{$i->tag_name}}></option>
                                @endforeach
                            </datalist>
                        </div>
                        <button type="button" id="addTagBtn" class="mt-1 btn btn-primary right-0">Add Tags+</button>
                    </div>
                    <div class="d-flex  justify-content-end">
                    <button type="submit" class="btn btn-primary shadow">ADD POST</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script defer>
    $(document).ready(function()
    {
        $('#addTagBtn').click(function() {
                var tags = `
                    <input list="tags" name="tags[]" id="postTitle" class="form-control mb-2">
                            <datalist id="tags">
                                @foreach ($tags as $i)
                                    <option value="{{$i->id}}">{{$i->tag_name}} </option>
                                @endforeach
                            </datalist>
                `;
            console.log('clicked');

                $('.tagContainer').append(tags);
            });

    });
</script>

@endsection
