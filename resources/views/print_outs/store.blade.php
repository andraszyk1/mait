@extends('template')
@section('title')
	@if(isset($title) )
		- {{ $title }}
	@endif
@endsection('title')
@section('content')
<table class="table">
  <thead>
    <tr>
         <th scope="col">Rfid Ascii / Rfid HEX / Barcode</th>
 

   <th scope="col">Zpl</th>
    </tr>
  </thead>
  <tbody>
  @for ($i =0 ; $i <$ilosc_etykiet ; $i++)
	 <tr>
	    <td>{{$rfid_ascii[$i]}} <br>{{$rfid_hex[$i]}}<br>{{$barcode[$i]}}</td>
	
		
		<td>{{$zpls[$i]}}</td>
    </tr>
  @endfor



  </tbody>
</table>
@endsection('content')