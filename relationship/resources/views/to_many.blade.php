@extends('templates.header')
@section('content')
<div class="container p-3">
    <h3>One to Many</h3>
    <p>A one-to-many relationship is used when
        a single record in one table can be associated with multiple records in another table.
        For example, a Post might have many Comments.</p>

        <div class="row">
            <div class="col-md-5 bg-dark text-white border-right rounded shadow">
                <p>Model "Traveller" can have many posts. hasMany()</p>
            </div>
        </div><hr>

        <div class="row py-3">
            <div class="col-md-8 border rounded shadow p-3">
                <h5 class="p-3">Add person</h5>
                <form action="{{route('om.save')}}" method="POST" class="">

                    @csrf

                    <div class="form-group">
                      <input type="text" class="form-control bg-dark text-white" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control bg-dark text-white" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control bg-dark text-white" name="place" placeholder="Enter place" required>
                    </div>
                    <div class="form-group">
                        <div id="inputContainer">
                            {{-- <input type="text" class="mb-1 form-control"  name="post[]" placeholder="Enter post"> --}}
                        </div>
                        <button type="button" id="addPostBtn" class="mt-1 btn btn-primary right-0">Add First Post+</button>
                        {{-- appent new input box --}}
                    </div>

                    <div class="d-flex  justify-content-end">
                    <button type="submit" class="btn btn-primary shadow">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @if(!$travellers->isEmpty())
        <div class="row py-3">
            <div class="col-md-12">
                <table class="table shadow table-dark">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Place</th>
                        <th>posts</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($travellers as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$i->name}}</td>
                            <td>{{$i->email}}</td>
                            <td>{{$i->address->place}}</td>
                            <td>
                                @foreach ($i->posts as $post)

                                @if(isSet($myposts[$post->mypost_id]))

                                {{ $myposts[$post->mypost_id]->post_name }},
                                @else
                                unknown ,
                                @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('om.delete', $i->id)}}" class="delete-link">
                                    <button class="btn btn-danger ">DELETE</button></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div><hr>
        @endif
</div>



<script type="text/javascript" src="{{asset('js/jquery-1.11.3.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#addPostBtn').click(function() {
                var posts = `
                    <select name="posts[]" id="posts" class="mb-2 form-control bg-dark text-white">
                        <option value="">Select a post</option>
                        @foreach ($myposts as $post)
                            <option value="{{ $post->id }}"> {{ $post->post_name }}</option>
                        @endforeach
                    </select>
                `;
                $('#inputContainer').append(posts);
                updateInputCount();
            });
            // $('#addPostBtn').click(function() {
            //     var count = $('#inputContainer input').length;
            //     // $('#inputContainer').append('<input type="text" class="mb-1 form-control" name="post[]" placeholder="post">');
            //     var newInput = document.createElement('input');
            //     newInput.type = 'text';
            //     newInput.className = 'mb-1 form-control';
            //     newInput.name = 'post[]';
            //     newInput.placeholder = 'Enter post' + (count+1);
            //     inputContainer.appendChild(newInput);

            //     updateInputCount();
            // });

            function updateInputCount() {
                var count = $('#inputContainer input').length;
                $('#addPostBtn').text('Add Post ' + (count+1) );
            }

            $('.delete-link').click(function(event) {
                event.preventDefault(); // Prevent the default link action
                var link = $(this).attr('href'); // Get the href attribute of the link

                // Show confirmation dialog
                var confirmed = confirm('Are you sure you want to delete this item?');

                // If the user confirms, redirect to the link
                if (confirmed) {
                    window.location.href = link;
                }
            });
        });

</script>
@endsection


