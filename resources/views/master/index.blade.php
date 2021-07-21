@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Masters</div>
                <div class="card-body">
                <ul class="list-group"> 
                    @foreach ($masters as $master)
                    <li class="list-group-item">
                        
                    <a href="{{route('master.edit',[$master])}}">{{$master->name}} {{$master->surname}}</a>
                    <form method="POST" action="{{route('master.destroy', $master)}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </form>
                    </li>
                    <br>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
