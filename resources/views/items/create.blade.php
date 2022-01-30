@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
@error('labels_count')
    <div style="color: red;">{{ $message }}</div>
@enderror
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-3">
<h5>Add Item </h5>

<form action="{{action('ItemsController@store')}}" method="POST" role="form">
@csrf
<div class='form-group'> 
    <label for="name">Item Name </label>
    <input type="text" class="form-control" name="name"/>

    <label for="userid"> User</label>
    <select name="userid" class="form-control">
        @foreach ($userList as $user)
            <option value="{{$user->id}}"> {{$user->name}}</option>
        @endforeach
    </select>

    <label for="computerid"> Computer</label>
    <select name="computerid" class="form-control">
        @foreach ($computerList as $computer)
            <option value="{{$computer->id}}"> {{"SN:".$computer->sn." Model: ".$computer->model. "Status: ".$computer->status }}</option>
        @endforeach
    </select>

    <label for="monitorid"> Monitor</label>
    <select name="monitorid" class="form-control">
        @foreach ($monitorList as $monitor)
            <option value="{{$monitor->id}}"> {{$monitor->sn}}</option>
        @endforeach
    </select>

    <label for="locationid"> Location</label>
    <select name="locationid" class="form-control">
        @foreach ($locationList as $location)
            <option value="{{$location->id}}"> {{$location->name}}</option>
        @endforeach
    </select>

    
    <label for="nr_inw">NR Inwetarzowy </label>
    <input type="text" class="form-control" name="nr_inw"/>
    <label for="mpk">MPK </label>
    <input type="text" class="form-control" name="mpk"/>
      <label for="description">Description </label>
    <input type="text" class="form-control" name="description"/>

     <input type="submit" value="Save" class="btn btn-primary"/>
  </div>
</form>
@endsection('content')