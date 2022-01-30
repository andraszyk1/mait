<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LocationsRepository;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index (LocationsRepository $locationRepo){
        if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
            return redirect()->route('login');
         }


        $lokalizacje=Location::query()->get();
        return view('location.list',['locationList'=>$lokalizacje,
        "footerYear"=>date('Y'),
        "title"=>"Locations"]);
    }
 


public function create(){
    if(Auth::user()->type != 'admin'){
        return redirect()->route('login');
     }
     
    return view('location.create',["footerYear"=>date('Y'),
    "title"=>"Create Location"]);
}

public function delete(locationsRepository $locationRepo,$id ){
    if(Auth::user()->type != 'admin'){
        return redirect()->route('login');
     }
     $location=$locationRepo->delete($id);
 
    return redirect('location');
    }

public function store(Request $request ){
    if(Auth::user()->type != 'admin'){
        return redirect()->route('login');
     }
    $location= new Location;
    $location->name=$request->input('name');
    $location->city=$request->input('city');
    $location->street=$request->input('street');
    $location->street_number=$request->input('street_number');
    $location->description=$request->input('description');
    $location->postal=$request->input('postal');
    $location->modifiedby_id=Auth::id();
    $location->owner_id=Auth::id();
    $location->save();
    return redirect()->action('LocationController@index');
}
public function edit($id){
    if(Auth::user()->type != 'admin'){
       return redirect()->route('login');
    }
    $location=Location::find($id);
    return view('location.edit',["location"=>$location,
    "footerYear"=>date('Y'),
    "title"=>"location Edit"]);
 }

 
public function editStore(Request $request){
    if(Auth::user()->type != 'admin'){
       return redirect()->route('login');
    }

    $location = Location::find($request->input('id'));
    $location->name=$request->input('name');
    $location->city=$request->input('city');
    $location->street=$request->input('street');
    $location->street_number=$request->input('street_number');
    $location->description=$request->input('description');
    $location->postal=$request->input('postal');
    $location->modifiedby_id=Auth::id();
    $location->save();
    return redirect()->action('LocationController@index');
 }
}