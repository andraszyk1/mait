@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<a href="{{URL::to('pn/create') }}">Add new part number</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">PN </th>
      <th scope="col">Modul</th>
	  <th scope="col">Layouts</th>
	   <th scope="col">Print Count</th>
       <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pniList as $pn)
    <tr>
        <th scope="row">{{$pn->id}}</th>
        <td>{{$pn->name}}</td>
        <td>{{$pn->modul}}</td>
		<td>
			@foreach ($pn->layouts as $layout)
				{{$layout->name}} 
			@endforeach
		</td>
		 <td>{{$pn->partnumberPrintOuts->count()}}</td>
      <td>
      <a href="{{URL::to('pn/delete/'.$pn->id) }}" onclick="return confirm('Are you sure to delete this layouts ?')">Delete</a>
      <a href="{{URL::to('pn/edit/'.$pn->id) }}" >Edit</a>
      </td>
    </tr>
	
	<tr>
	
	
	

	
	 @endforeach
  </tbody>
</table>

@endsection('content')