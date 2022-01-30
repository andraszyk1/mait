
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')

@section('content')
@foreach($locationList as $location)
<div class="mt-2 mb-2 pl-2">
  <div class="custom-control custom-checkbox">
      <input type="checkbox" class="castom-control-input" id="location-{{$location->id}}" value="{{$location->id}}">
      <label for="location-{{$location->id}}">{{$location->name}}</label>
  </div>
</div>
@endforeach

<a class="btn btn-outline-dark"  href="{{URL::to('items/create') }}"> Add item</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Monitor</th>
      <th scope="col">Computer</th>
      <th scope="col">Inventory Number</th>
      <th scope="col">MPK</th>
      <th scope="col">Location</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($itemsList as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
 
      <td>{{$item->user->name}}</td>
      <td>{{$item->monitor->model."|".$item->monitor->sn}}</td>
	    <td>{{$item->computer->model."|".$item->computer->sn}}</td>
	    <td>{{$item->nr_inw}}</td>
	    <td>{{$item->mpk}}</td>
	    <td>{{$item->location->name}}</td>
  
	    <td>
      
      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('item/delete/'.$item->id) }}" onclick="return confirm('Are you sure to delete this item inventory ?')">Delete</a>
      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('item/edit/'.$item->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection('content')
