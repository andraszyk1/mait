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
           
    
}
        </ul>
    </div>
@endif
<div class="col-3">
<h5>Add Print Out </h5>

<form action="{{action('Print_OutsController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class='form-group'> 

    <label for="labels_count">Label Count </label>
    <input type="text" class="form-control" name="labels_count"/>


    <label for="partsnumbersid"> Part Number </label>
    <select name="partsnumbersid" class="form-control">
    @foreach ($partsnumbersList as $partnumber)
         <option value="{{$partnumber->id}}"> {{$partnumber->name." ".$partnumber->modul }}</option>
    @endforeach
    </select>
    
    {{-- <label for="layoutsid"> Layout </label>
    <select name="layoutsid" class="form-control">
    @foreach ($layoutsList as $layout)
          <option value="{{$layout->id}}">{{$layout->name}}</option>
    @endforeach
    </select> --}}
{{-- 
    <label for="printersid"> Printer </label>
    <select name="printersid" class="form-control">
    @foreach ($printersList as $printer)
          <option value="{{$printer->id}}">{{$printer->ip." | ".$printer->location}}</option>
    @endforeach
    </select> --}}
      <label for="last_sn"> Last Serial Number </label>
      <input type="text" class="form-control" name="last_sn" value="{{$last_sn}}" disabled>
      <input type="hidden" class="form-control" name="last_sn" value="{{$last_sn}}" />
</div>  
    <input type="submit" value="Print" class="btn btn-primary"/>
    </form>


           
         

  </div>
@endsection('content')