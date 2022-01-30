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
        </ul>
    </div>
@endif


 <div class="card col-auto-md">
  <div class="card-header">
   Add Location
  </div>
  <div class="card-body">
    <form action="{{action('LocationController@store')}}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class='form-group'> 
    <label for="name"> Name </label>
    <input type="text" class="form-control" name="name"/>
    <label for="street"> Street</label>
    <input type="text" class="form-control" name="street"/>
    <label for="street_number"> Street number </label>
    <input type="text" class="form-control" name="street_number"/>
    <label for="city"> City </label>
    <input type="text" class="form-control" name="city"/>
    <label for="postal"> Postal Code </label>
    <input type="text" class="form-control" name="postal"/>
    <label for="description"> description </label>
    <input type="text" class="form-control" name="description"/>
</div>  
    <input type="submit" value="Add" class="btn btn-primary"/>
</form>
</div>
</div>



  
@endsection('content')