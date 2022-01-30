@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
 
<h5>Edit computer</h5>
<form action="{{action('ComputerController@editStore')}}" method="POST" role="form">
@csrf
<input type="hidden" name="id" value="{{$computer->id}}" />
<div class='form-group'> 
    <label for="model"> Computer Name </label>
    <input type="text" class="form-control" name="model" value="{{$computer->model}}"/>
    <label for="sn"> Serial Number </label>
    <input type="text" class="form-control" name="sn" value="{{$computer->sn}}"/>
    <label for="ram"> ram </label>
    <input type="text" class="form-control" name="ram" value="{{$computer->ram}}"/>
    <label for="processor"> processor </label>
    <input type="text" class="form-control" name="processor" value="{{$computer->processor}}"/>
    <label for="hdd"> hdd </label>
    <input type="text" class="form-control" name="hdd" value="{{$computer->hdd}}"/>
    <label for="OS"> OS </label>
    <input type="text" class="form-control" name="OS" value="{{$computer->OS}}"/>
    <label for="created_at"> created_at </label>
    <input type="text" class="form-control" name="created_at" value="{{$computer->created_at}}" disabled/>
    <label for="updated_at"> updated_at </label>
    <input type="text" class="form-control" name="updated_at" value="{{$computer->updated_at}}"disabled/>
    <label for="Owner"> owner </label>
    <input type="text" class="form-control" name="owner" value="{{$computer->owner['name']}}"disabled/>
    <label for="Modifiedby"> modifiedby </label>
    <input type="text" class="form-control" name="modifiedby" value="{{$computer->modifiedby['name']}}" disabled/>
    
    <label for="status"> Status</label>
    <select name="status" class="form-control">
    @if ($computer->status=='inuse')
            <option value="inuse">inuse</option>
            <option value="instore">instore</option>
        @else 
            <option value="instore">instore</option>
            <option value="inuse">inuse</option>
      
        @endif
    </select>
    
    <label for="type"> Type</label>
    <select name="type" class="form-control">
        @foreach ($typescomputer as $type )
            @if($computer->type==$type){
                <option value="{{$type}}" selected>{{$type}}</option>
            }@else 
            <option value="{{$type}}">{{$type}}</option>
            @endif
        @endforeach
    </select>
 
</div>  
    <input type="submit" value="Update" class="btn btn-primary"/>
    </form>
  
@endsection('content')