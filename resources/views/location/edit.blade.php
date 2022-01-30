@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
 
<h5>Edit location</h5>
<form action="{{action('LocationController@editStore')}}" method="POST" role="form">
@csrf
<input type="hidden" name="id" value="{{$location->id}}" />
<div class='form-group'> 
    <label for="model"> Location Name </label>
    <input type="text" class="form-control" name="name" value="{{$location->name}}"/>
    <label for="street"> street</label>
    <input type="text" class="form-control" name="street" value="{{$location->street}}"/>
    <label for="street_number"> street_number </label>
    <input type="text" class="form-control" name="street_number" value="{{$location->street_number}}"/>
    <label for="city"> city </label>
    <input type="text" class="form-control" name="city" value="{{$location->city}}"/>
    <label for="postal"> postal </label>
    <input type="text" class="form-control" name="postal" value="{{$location->postal}}"/>
    <label for="description"> description </label>
    <input type="text" class="form-control" name="description" value="{{$location->description}}"/>
    <label for="created_at"> created_at </label>
    <input type="text" class="form-control" name="OS" value="{{$location->created_at}}" disabled/>
    <label for="updated_at"> updated_at </label>
    <input type="text" class="form-control" name="OS" value="{{$location->updated_at}}"disabled/>
    <label for="Owner"> owner </label>
    <input type="text" class="form-control" name="OS" value="{{$location->owner['name']}}"disabled/>
    <label for="Modifiedby"> modifiedby </label>
    <input type="text" class="form-control" name="OS" value="{{$location->modifiedby['name']}}" disabled/>

 
</div>  
    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
  
@endsection('content')