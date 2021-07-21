@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
               <h2>Outfits</h2>
               <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                <fieldset>
                <legend>Sort by:</legend>
                <div>
                <label>Type</label><input type="radio" name="sort_by" value="type" @if('type' == $sort) checked @endif>
                </div>
                <div>
                <label>Size</label><input type="radio" name="sort_by" value="size" @if('size' == $sort) checked @endif>
                </div>
                </fieldset>
                <fieldset>
                <legend>Direction:</legend>
                <div>
                <label>Asc</label><input type="radio" name="dir" value="asc" @if('asc' == $dir) checked @endif>
                </div>
                <div>
                <label>Desc</label><input type="radio" name="dir" value="desc" @if('desc' == $dir) checked @endif>
                </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Sort</button>
                <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
               </form>
               
               
               
               </div>

               <div class="card-body">
               <ul class="list-group">
                 @foreach ($outfits as $outfit)
                  <li class="list-group-item">
                    <div class="list-container">
                      <div class="list-container__content">
                        <span class="list-container__content__outfit">{{$outfit->type}} size: {{$outfit->size}}</span>
                        <span class="list-container__content__master">{{$outfit->outfitMaster->name}} {{$outfit->OutfitMaster->surname}}</span>
                      </div>
                      <div class="list-container__buttons">
                        <a href="{{route('outfit.edit', [$outfit])}}" class="btn btn-success">Edit</a>
                        <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
                @endforeach
                </ul>
               </div>
               {{ $outfits->links() }}
           </div>
       </div>
   </div>
</div>
@endsection