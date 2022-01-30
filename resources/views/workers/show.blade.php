@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<div class="container">
  <div class="card mb-3" style="">
  <div class="card-header bg-dark text-white"><h5>{{$worker->name}}</h5></div>
  <div class="card-body">
    
    <p class="card-text">Worker ID : {{$worker->id_hr_sap}}</p>
    <p class="card-text">First Name : {{$worker->firstname}}</p>
    <p class="card-text">Surname : {{$worker->surname}}</p>
    <p class="card-text">Email : {{$worker->email}}</p>
    <p class="card-text">Phone : {{$worker->phone}}</p>
    <p class="card-text">Status : {{$worker->status}}</p>
    <p class="card-text">Type : {{$worker->type}}</p>
</div>
  <div class="card-header bg-dark text-white"><h5>Print Outs ({{ $worker->PrintOuts->count()}})</h5></div>

  <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Part Number</th>
	  <th scope="col">Printer</th>
      <th scope="col">Label Layouts</th>
	  <th scope="col">Label Count</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($worker->PrintOuts as $printout ) 
    <tr>
 
	    <td>{{$printout->parts_number->name }}</td>
	    <td>{{$printout->printer->ip}}</td>
	    <td>{{$printout->labels_layouts->name}}</td>
        <td>{{$printout->labels_count}}</td>
	    <td>{{$printout->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table
</div>
</div>


@endsection('content')
