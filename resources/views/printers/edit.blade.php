@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Edit Printer</h5>
<form action="{{action('PrintersController@editStore')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="id" value="{{$printer->id}}" />
<div class='form-group'> 
    <label for="name"> Printer Name </label>
    <input type="text" class="form-control" name="name" value="{{$printer->name}}"/>
    <label for="ip"> IP </label>
    <input type="text" class="form-control" name="ip" value="{{$printer->ip}}"/>
    <label for="location"> Localization </label>
    <input type="text" class="form-control" name="location" value="{{$printer->location}}"/>
</div>  
    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
  
@endsection('content')