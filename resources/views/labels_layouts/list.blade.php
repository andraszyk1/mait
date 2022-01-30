
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<a href="{{URL::to('layouts/create') }}">Add new layout</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Project</th>
      <th scope="col">Last modified</th>
      <th scope="col">ZPL Code</th>
      <th scope="col">Printer</th>
	  
	  
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($labels_layoutsList as $labels_layout)
    <tr>
      <th scope="row">{{$labels_layout->id}}</th>
   
      <td>{{$labels_layout->name}}</td>
      <td>{{$labels_layout->project}}</td>
	    <td>{{$labels_layout->user->name}}</td>
      <td>
	    	<textarea readonly rows="4" cols="50">{{$labels_layout->zpl}}
				</textarea>
				</td>
        <td>

        @foreach ($labels_layout->printers as $printer)
				{{$printer->name}} {{$printer->location}}

			@endforeach
         
      	</td>

	 
	  
	  </td>
      <td>
      <a href="{{URL::to('layouts/delete/'.$labels_layout->id) }}" onclick="return confirm('Are you sure to delete this layouts ?')">Delete</a>
      <a href="{{URL::to('layouts/edit/'.$labels_layout->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')
