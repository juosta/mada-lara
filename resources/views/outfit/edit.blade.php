@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit outfit</div>
                <div class="card-body">

                  <form method="POST" action="{{route('outfit.update',[$outfit])}}">
                     <label>Type</label>
                     <input type="text" name="outfit_type" class="form-control" value="{{$outfit->type}}">
                     <small class="form-text text-muted">Outfit tipas.</small>
                     <label>Color</label>
                     <input type="text" name="outfit_color" class="form-control" value="{{$outfit->color}}">
                     <small class="form-text text-muted">Outfit color.</small>
                     <label>Size</label>
                     <input type="text" name="outfit_size" class="form-control" value="{{$outfit->size}}">
                     <small class="form-text text-muted">Outfit size.</small>
                     <label>About</label>
                     <textarea name="outfit_about" id="summernote">{{$outfit->about}}</textarea>
                     <small class="form-text text-muted">Outfit about.</small>
                <select name="master_id">
                    @foreach ($masters as $master)
                    <option value="{{$master->id}}" @if($master->id == $outfit->master_id) selected @endif>
                        {{$master->name}} {{$master->surname}}
                    </option>
                    @endforeach
                </select>
                @csrf
                <button type="submit">EDIT</button>
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
