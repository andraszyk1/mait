
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')

@section('content')
<a href="{{URL::to('location/create') }}">Add location</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Street</th>
      <th scope="col">Stree No</th>
      <th scope="col">postal</th>
      <th scope="col">description</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($locationList as $location)
    <tr>
      <th scope="row">{{$location->id}}</th>
   
      <td>{{$location->name}}</td>
      <td>{{$location->city}}</td>
	    <td>{{$location->street}}</td>
	    <td>{{$location->street_number}}</td>
	    <td>{{$location->postal}}</td>
	    <td>{{$location->description}}</td>
	    <td>
      <a href="{{URL::to('location/delete/'.$location->id) }}" onclick="return confirm('Are you sure to delete this location ?')">Delete</a>
      <a href="{{URL::to('location/edit/'.$location->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')
