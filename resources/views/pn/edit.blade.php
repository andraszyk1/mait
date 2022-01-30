@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Edit Part Number</h5>
<form action="{{action('PartNumbersController@editStore')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="id" value="{{$pn->id}}" />
<div class='form-group'> 
    <label for="name"> Part Number </label>
    <input type="text" class="form-control" name="name" value="{{$pn->name}}"/>
    <label for="modul"> Moduł </label>
    <input type="text" class="form-control" name="modul" value="{{$pn->modul}}"/>
	<label for="layouts"> Layouts </label>
	@foreach ($layouts as $layout)
	@if($pn->layouts->contains($layout->id))
		 <input type="checkbox" class="form-control" name="layouts[]" value="{{$layout->id}}" checked/>{{$layout->name}}
	 @else
		   <input type="checkbox" class="form-control" name="layouts[]" value="{{$layout->id}}"/>{{$layout->name}}
		@endif
	@endforeach
</div>  
    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
  
@endsection('content')