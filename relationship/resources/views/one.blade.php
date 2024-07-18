@extends('templates.header')
@section('content')
<div class="container p-3">
    <div class="row">
        <h3>One to One</h3>
        <p>A one-to-one relationship is a simple relationship where
        a single record in one table is associated with a single record in another table.
        For example, a User might have one Profile.
    </p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 bg-dark text-white border-right rounded shadow">
            <p class=" border-bottom">Table Traveller (id, name, email) hasOne Address (id, travel_id, Place)</p>
            <h6 class="mt-1">Traveller.php </h6>
            <p>public function address() <br>{ <br>
                return $this->hasOne(Address::class,'travel_id','id'); <br> //(model_name, 'foreign_key', 'local_primary_key') <br>
            }</p>
        </div>
        <div class="col-md-6  bg-dark text-white rounded shadow">
            <h6 class="mt-1">Address.php </h6>
            <p>public function travel() <br>{ <br>
                return $this->belongsTo(Traveller::class); <br>
            }</p>
        </div>
    </div><hr>

    @if($travellers->isNotEmpty())
    <div class="row py-3">
        <div class="col-md-10 shadow">
            <table class="table  table-dark">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Place</th>
                </thead>
                <tbody>
                    @foreach ($travellers as $i)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$i->name}}</td>
                        <td>{{$i->email}}</td>
                        <td>{{$i->address->place}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div><hr>
    @endif 
</div>

@endsection

