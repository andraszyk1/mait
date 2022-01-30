@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<a href="{{URL::to('workers/create') }}">Add new User</a>
@foreach ($statistics as $stat)
@if ($stat->status=='active')
   Active: {{$stat->user_count}}
@endif
    @if ($stat->status=='inactive')
   Inactive: {{$stat->user_count}}
@endif
@endforeach
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
	    <th scope="col">Status</th>
      <th scope="col">Type</th>
	   <th scope="col">Prints Count</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($workerslist as $worker)
    <tr>
      <th scope="row">{{$worker->id}}</th>
      <td><a href="{{ URL::to('workers/'.$worker->id)}}">{{$worker->id_hr_sap}}</a></td>
      <td>{{$worker->name}}</td>
	    <td>{{$worker->email}}</td>
	    <td>{{$worker->phone}}</td>
      <td>{{$worker->status}}</td>
      <td>{{$worker->type}}</td>
	    <td>{{$worker->PrintOuts->count()}}</td>

      <td>
      <a href="{{URL::to('workers/delete/'.$worker->id) }}" onclick="return confirm('Are you sure to delete this worker ?')">Delete</a>
      <a href="{{URL::to('workers/edit/'.$worker->id) }}" )">Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection('content')
