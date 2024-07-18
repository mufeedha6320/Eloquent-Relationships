@extends('templates.header')
@section('content')
<div class="container p-3">
    <h3>Mant to Many</h3>
    <p>A many-to-many relationship is used when records in one table can be associated with
        multiple records in another table, and vice versa.
        For example, a User might have many Roles, and a Role might have many Users.</p>
        <div class="row py-3 justify-content-center">
            <div class="col-md-6 border rounded  p-3">
                <h5 class="p-3">Add tags to your post </h5>
                <form action="{{route('to.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label> Choose a post</label>
                      <select name="post" id="post" class="form-control bg-dark text-white" required>
                        <option value="">Select a post</option>
                        @foreach ($myposts as $post)
                            <option value="{{$post->id}}">{{$post->post_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Choose tags</label>
                        <div id="tagContainer">
                            <select name="tags[]" id="tags" class="mb-2 form-control bg-dark text-white" required>
                                <option value="">Select a tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" id="addTagBtn" class="mt-1 btn btn-primary right-0">Add Tags+</button>
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary shadow">Submit</button>
                    </div>
                </form>
            </div>
            <!--- Add post to many tags --->
            {{-- <div class="col-md-6 border rounded p-3">
                <h5 class="p-3">Attach a tag to many posts   </h5>
                <form action="{{route('to.tag')}}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label> Choose a tag</label>
                      <select name="tag" id="tag" class="form-control bg-dark text-white" required>
                        <option value="">Select a tag</option>
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Choose posts</label>
                        <div id="postContainer">
                            <select name="posts[]" id="posts" class="mb-2 form-control bg-dark text-white" required>
                                <option value="">Select a post</option>
                                @foreach ($myposts as $post)
                                <option value="{{$post->id}}">{{$post->post_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" id="addPostBtn" class="mt-1 btn btn-primary right-0">Add Posts+</button>
                    </div>


                    <div class="d-flex  justify-content-end">
                    <button type="submit" class="btn btn-primary shadow">Submit</button>
                    </div>
                </form>
            </div> --}}
        </div>
</div>

<script defer>
    $(document).ready(function()
    {
        $('#addTagBtn').click(function() {
                var tags = `
                    <select name="tags[]" id="tags" class="mb-2 form-control bg-dark text-white">
                        <option value="">Select a tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                        @endforeach
                    </select>
                `;
                $('#tagContainer').append(tags);
            });
        $('#addPostBtn').click(function() {
                var posts = `
                    <select name="posts[]" id="posts" class="mb-2 form-control bg-dark text-white">
                        <option value="">Select a post</option>
                        @foreach ($myposts as $post)
                            <option value="{{ $post->id }}">{{ $post->post_name }}</option>
                        @endforeach
                    </select>
                `;
                $('#postContainer').append(posts);
            });
    });
</script>
@endsection


