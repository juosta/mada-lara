@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                <div class="card-body">
                    @foreach ($outfits as $outfit)
                    <a href="{{route('outfit.edit',[$outfit])}}">Type: {{$outfit->type}} Size: {{$outfit->size}}. <b>Master: {{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}</b></a>
                    <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
