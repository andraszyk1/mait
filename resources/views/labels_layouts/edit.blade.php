@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Edit Layout</h5>
<form action="{{action('LayoutsController@editStore')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="id" value="{{$layout->id}}" />
<div class='form-group'> 
    <label for="name"> Layout </label>
    <input type="text" class="form-control" name="name" value="{{$layout->name}}"/>
    <label for="project"> Project </label>
    <input type="text" class="form-control" name="project"  value="{{$layout->project}}"/>
    <label for="zpl"> ZPL Code </label>
    <textarea  class="form-control" name="zpl" > {{$layout->zpl}}</textarea>
    	@foreach ($printers as $printer)
	@if($layout->printers->contains($printer->id))
		 <input type="radio" class="form-control" name="printers[]" value="{{$printer->id}}" checked/>{{$printer->ip}}
	 @else
		   <input type="radio" class="form-control" name="printers[]" value="{{$printer->id}}"/>{{$printer->ip}}
		@endif
	@endforeach
</div>  
    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
  
@endsection('content')