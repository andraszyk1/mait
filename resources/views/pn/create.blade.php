@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Add Part Number</h5>
<form action="{{action('PartNumbersController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class='form-group'> 
    <label for="name"> Part Number </label>
    <input type="text" class="form-control" name="name"/>
    <label for="modul"> Moduł </label>
    <input type="text" class="form-control" name="modul"/>
	   <label for="layouts"> Layouts </label>
	   @foreach ($layouts as $layout)
    <input type="checkbox" class="form-control" name="layouts[]" value="{{$layout->id}}"/>{{$layout->name}}
	@endforeach
</div>  
    <input type="submit" value="Add" class="btn btn-primary"/>
    </form>
  
@endsection('content')