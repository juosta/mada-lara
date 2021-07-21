@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Master</div>
                <div class="card-body">
                    <form method="POST" action="{{route('master.update',$master)}}">
                     <label>Name</label>
                     <input type="text" name="master_name" class="form-control" value="{{$master->name}}">
                     <small class="form-text text-muted">Name.</small>
                     <label>Surname</label>
                     <input type="text" name="master_surname" class="form-control" value="{{old('master_surname',$master->surname)}}">
                     <small class="form-text text-muted">Surname.</small>
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
