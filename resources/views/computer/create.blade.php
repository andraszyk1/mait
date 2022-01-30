@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           
    
}
        </ul>
    </div>
@endif
 <div class="card col-4">
  <div class="card-header">
   Add Computer
  </div>
  <div class="card-body">
    <form action="{{action('ComputerController@store')}}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class='form-group'> 
    <label for="name"> Model </label>
    <input type="text" class="form-control" name="model"/>
    <label for="ip"> Serial Number</label>
    <input type="text" class="form-control" name="sn"/>
    <label for="location"> RAM </label>
    <input type="text" class="form-control" name="ram"/>
    <label for="location"> Processor </label>
    <input type="text" class="form-control" name="processor"/>
    <label for="location"> HDD </label>
    <input type="text" class="form-control" name="hdd"/>
    <label for="location"> Operating System </label>
    <input type="text" class="form-control" name="OS"/>
    <label for="status"> Status</label>
        <select name="status" class="form-control">
            <option value="inuse">inuse</option>
            <option value="instore">instore</option>
        </select>
    <label for="type"> Type</label>
        <select name="type" class="form-control">
            <option value="laptop">Laptop</option>
            <option value="pc">PC</option>
            <option value="server">Server</option>
            <option value="terminal">Terminal</option>
        </select>
</div>  
    <input type="submit" value="Add" class="btn btn-primary"/>
    </form>
    
  </div>
</div>



  
@endsection('content')