@extends('templates.header')
@section('content')
<div class="container p-3">
        <div class="row py-3">
            @if($tags->isNotEmpty())
            <div class="col-md-7">
                <table class="table shadow table-dark">
                    <thead>
                        <th>#</th>
                        <th>tags</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$i->tag_name}}</td>
                            <td><a href=""><button class="btn btn-danger">DELETE</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="col-md-5 border rounded-lg p-3 h-100">
                <h5 class="p-2">Add New Tag</h5>
                <form action="{{route('save.tag')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="postTitle">Tag Title:</label>
                        <input list="tags" name="tag" id="tagTitle" class="form-control">
                        <datalist id="tags">
                            @foreach ($tags as $i)
                                <option value="{{$i->tag_name}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="d-flex  justify-content-end">
                    <button type="submit" class="btn btn-primary shadow" >ADD</button>
                    </div>
                </form>
            </div>
        </div>
</div>


@endsection


