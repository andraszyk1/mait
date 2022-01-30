@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Add Layout</h5>
<form action="{{action('LayoutsController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class='form-group'> 
    <label for="name"> Layout </label>
    <input type="text" class="form-control" name="name"/>
    <label for="project"> Project </label>
    <input type="text" class="form-control" name="project"/>
    <label for="zpl"> ZPL Code </label>
    <input type="text" class="form-control" name="zpl"/>
    
	@foreach ($printers as $printer)
    <input type="checkbox" class="form-control" name="printers[]" value="{{$printer->id}}"/>{{$printer->ip}}
	@endforeach 
 

</div>  
    <input type="submit" value="Add" class="btn btn-primary"/>
    </form>
  
@endsection('content')