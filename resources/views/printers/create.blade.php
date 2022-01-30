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
<h5>Add Printer</h5>
<form action="{{action('PrintersController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class='form-group'>
    <label for="name"> Printer Name </label>
    <input type="text" class="form-control" name="name"/>
    <label for="ip"> IP </label>
    <input type="text" class="form-control" name="ip"/>
    <label for="location"> Localization </label>
    <input type="text" class="form-control" name="location"/>
    <label for="sn"> Serial Number </label>
    <input type="text" class="form-control" name="sn"/>
    <label for="licznik"> Licznik </label>
    <input type="text" class="form-control" name="licznik"/>
</div>
    <input type="submit" value="Add" class="btn btn-primary"/>
    </form>

@endsection('content')
