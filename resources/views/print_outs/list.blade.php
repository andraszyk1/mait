@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<a href="{{URL::to('print_outs/create') }}">Add new print out</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Part Number</th>
	    <th scope="col">Printer</th>
      <th scope="col">Label Layouts</th>
      <th scope="col">Created</th>
      <th scope="col">Labels count</th>
      <th scope="col">Last SN</th>
    </tr>
  </thead>
  <tbody>

      
  
  @foreach ($print_outsList as $printout)
    <tr>
      <th scope="row">{{$printout->id}}</th>
      <td>{{$printout->user->name}} ({{ $printout->user->id_hr_sap }})</td>
	    <td>{{$printout->parts_number->name }}</td>
	    <td>{{$printout->printer->ip}}</td>
	    <td>{{$printout->labels_layouts->name}}</td>
      <td>{{$printout->created_at}}</td>
        <td>{{$printout->labels_count}}</td>
        <td>{{$printout->last_sn}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')
