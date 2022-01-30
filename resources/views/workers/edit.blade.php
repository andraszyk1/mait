@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')

<h5>Edit User</h5>
<form action="{{action('WorkersController@editStore')}}" method="POST" role="form">
<input type="hidden" name="token" value="{{ csrf_token() }}" />
<input type="hidden" name="id" value="{{ $worker->id }}" />
<div class='form-group'>
    <label for="name"> User Name </label>
    <input type="text" class="form-control" name="name" value="{{$worker->name}}"/>
    <label for="email"> Email </label>
    <input type="text" class="form-control" name="email" value="{{$worker->email}}"/>
    <label for="id_hr_sap"> ID </label>
    <input type="text" class="form-control" name="id_hr_sap" value="{{$worker->id_hr_sap}}"/>

    <label for="type"> Type </label>
    <select name="type" class="form-control">
      @if($worker->type=='admin')
        <option name="type" value='admin' selected>Administrator</option>
        <option name="type" value='user'>User</option>
      @else
        <option name="type" value='admin' >Administrator</option>
        <option name="type" value='user' selected>User</option>
      @endif
    </select>

  <label for="status"> Status </label>
  <select name="status" class="form-control">
    @if($worker->status=='active')
      <option name="status" value='active' selected>Active</option>
      <option name="status" value='inactive'>Inactive</option>
    @else
      <option name="status" value='active' >Active</option>
      <option name="status" value='inactive' selected>Inactive</option>
    @endif
 </select>
 </div>

    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
    <a href="{{URL::to('password/reset/'.Auth::id())}}">Reset Password</a>

@endsection('content')
