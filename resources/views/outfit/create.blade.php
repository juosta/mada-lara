@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new outfit</div>
                <div class="card-body">
                    <form method="POST" action="{{route('outfit.store')}}">
                     <label>Type</label>
                     <input type="text" name="outfit_type" class="form-control" >
                     <small class="form-text text-muted">Outfit tipas.</small>
                     <label>Color</label>
                     <input type="text" name="outfit_color" class="form-control">
                     <small class="form-text text-muted">Outfit color.</small>
                     <label>Size</label>
                     <input type="text" name="outfit_size" class="form-control" >
                     <small class="form-text text-muted">Outfit size.</small>
                     <label>About</label>
                     <textarea name="outfit_about" id="summernote"></textarea>
                     <small class="form-text text-muted">Outfit about.</small>
                        <select name="master_id">
                            @foreach ($masters as $master)
                            <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
$('#summernote').summernote();
});
</script>
@endsection
