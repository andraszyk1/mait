
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')

@section('content')

<a class="btn btn-outline-dark"  href="{{URL::to('monitor/create') }}"> Add monitor</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Model</th>
      <th scope="col">Serial number</th>
      <th scope="col">Resolution</th>
      <th scope="col">Description</th>


    </tr>
  </thead>
  <tbody>
  @foreach ($monitorList as $monitor)
    <tr>
      <th scope="row">{{$monitor->id}}</th>
   
      <td>{{$monitor->model}}</td>
      <td>{{$monitor->sn}}</td>
	    <td>{{$monitor->resolution}}</td>
	    <td>{{$monitor->description}}</td>
	
	    <td>
      
      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('compmuter/delete/'.$monitor->id) }}" onclick="return confirm('Are you sure to delete this monitor ?')">Delete</a>
      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('monitor/edit/'.$monitor->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')
