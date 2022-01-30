
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')

@section('content')

    @if (session('status'))
       <div class="alert alert-success">
            {{ session('status')}}
       </div>
    @endif

<a href="{{URL::to('printers/create') }}">Add new printer</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Ip</th>
      <th scope="col">Location</th>
      <th scope="col">SN</th>
      <th scope="col">Licznik</th>
	    <th scope="col">Label Type</th>
	    <th scope="col">Ribbon Type</th>
	    <th scope="col">Use Layout</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($printersList as $print)
    <tr>
      <th scope="row">{{$print->id}}</th>

      <td>{{$print->name}}</td>
      <td>{{$print->ip}}</td>
	    <td>{{$print->place->name}}</td>
	    <td>{{$print->sn}}</td>
	    <td>{{$print->licznik}}</td>
	    <td>{{$print->label_type}}</td>
	    <td>{{$print->ribbon_type}}</td>
		<td>



		</td>
	    <td>
      <a href="{{URL::to('printers/delete/'.$print->id) }}" onclick="return confirm('Are you sure to delete this layouts ?')">Delete</a>
      <a href="{{URL::to('printers/edit/'.$print->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')
