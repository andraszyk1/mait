@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Add User</h5>
<form action="{{action('WorkersController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class='form-group'> 
    <label for="name"> User Name </label>
    <input type="text" class="form-control" name="name" value="{{ old('name')}}"/>
    <label for="email"> Email </label>
    <input type="text" class="form-control" name="email" value="{{ old('email')}}"/>
    @error('email')
     <div style="color: red;">{{ $message }}</div>
    @enderror
    <label for="id_hr_sap"> User ID rcp </label>
    <input type="text" class="form-control" name="id_hr_sap"  value="{{ old('id_hr_sap')}}"/>
    @error('id_hr_sap')
     <div style="color: red;">{{ $message }}</div>
    @enderror
    <label for="type"> Type </label>
   <select name="type" class="form-control">
    <option name="type" value='admin'>Administrator</option>
    <option name="type" value='user'>User</option>
    </select>
      <label for="type"> Password </label>
          <input type="password" class="form-control" name="password"/>
</div>  
    <input type="submit" value="Add" class="btn btn-primary"/>
    </form>
  
@endsection('content')