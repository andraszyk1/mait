
@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')

@section('content')
@php
    echo session('status')
@endphp
<div class="row">
    @if (session('status'))
       <div class="alert alert-success">
            {{ session('status')}}
       </div>
    @endif
</div>
<a class="button button-dark" href="{{URL::to('computer/create')}}"> Add Computer</a>

<form class="computer_filter">

 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">
        <input type="text" class="form-control search" placeholder="Name" id="name" name="search[name]">
      </th>
      <th scope="col">
        <input type="text" class="form-control search" placeholder="SN" id="search" name="search[sn]">
      </th>
      <th scope="col">
        <input type="text" class="form-control search" placeholder="RAM"  id="search" name="search[ram]">
      </th>
      <th scope="col">
        <input type="text" class="form-control search" id="search" name="search[processor]" placeholder="Processor">
      </th>
      <th scope="col">
        <input type="text" class="form-control search" id="search" name="search[hdd]" placeholder="HDD">
      </th>
      <th scope="col">
         <input type="text" class="form-control search" id="search" name="search[os]" placeholder="OS">
      </th>
         <th scope="col">
         <input type="text" class="form-control search" id="search" name="search[status]" placeholder="Status">
      </th>

      <th scope="col">Actions</th>
    </tr>

  </thead>
  <tbody>


  @foreach ($computerList as $computer)
    <tr>
      <th scope="row">{{$computer->id}}</th>

      <td>{{$computer->model}}</td>
      <td>{{$computer->sn}}</td>
	    <td>{{$computer->ram}}</td>
	    <td>{{$computer->processor}}</td>
	    <td>{{$computer->hdd}}</td>
	    <td>{{$computer->OS}}</td>
      <td>{{$computer->status}}</td>


	    <td>

      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('computer/delete/'.$computer->id) }}" onclick="return confirm('Are you sure to delete this computer ?')">Delete</a>
      <a class="btn btn-outline-dark btn-sm" href="{{URL::to('computer/edit/'.$computer->id) }}" >Edit</a>
      </td>

    </tr>
    @endforeach

  </tbody>
</table>
 </form>
    {{-- {{ $computerList->links() }} --}}


@endsection('content')


@section('js-files')
<script src="{{URL::asset('js/computerlist.js')}}"></script>
@endsection


