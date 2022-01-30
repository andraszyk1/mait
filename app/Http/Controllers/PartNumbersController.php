<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartsNumber;
use App\Models\Label_layout;
use App\Repositories\PartsNumbersRepository;
use Illuminate\Support\Facades\Auth;

class PartNumbersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index(PartsNumbersRepository $partNumbers){
        if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
            return redirect()->route('login');
        }
        $pn = $partNumbers->getAll1();  
        return view('pn.list',["pniList"=>$pn,
                                      "footerYear"=>date('Y'),
                                      "title"=>"Parts Numbers"]);
     }

     public function create(){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
		 
		$layouts=Label_layout::all();
		
        return view('pn.create',
			["footerYear"=>date('Y'),
			"title"=>"Create Part Number",
			"layouts"=>$layouts
			]);
    }
    public function delete(PartsNumbersRepository $partNumbers,$id ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
         $pn=$partNumbers->delete($id);
     
        return redirect('pn');
        }
    public function store(Request $request ){
		$request->validate([
			'name'=>'required|max:15|unique:parts_numbers'
			]);
			
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
        $partsNumber= new PartsNumber;
        $partsNumber->name=$request->input('name');
        if($request->input('modul')!="")
        $partsNumber->modul=$request->input('modul');
        else
        $partsNumber->modul="";
	    $partsNumber->save();
		$partsNumber->layouts()->sync($request->input('layouts'));
   
        return redirect()->action('PartNumbersController@index');
    }
    public function edit(PartsNumbersRepository $partNumbers,$id){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }
        $layouts=Label_layout::all();
		$partNumber=$partNumbers->find($id);
		
        return view('pn.edit',["pn"=>$partNumber,
        "footerYear"=>date('Y'),
        "title"=>"Part Number Edit",
			"layouts"=>$layouts
			]);
     }

     
    public function editStore(Request $request){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }
 
        $pn= PartsNumber::find($request->input('id'));
        $pn->name=$request->input('name');
        if($request->input('modul')==null)
        {
            $pn->modul='';
        }
        else
        $pn->modul=$request->input('modul');
        $pn->save();
		$pn->layouts()->sync($request->input('layouts'));
        return redirect()->action('PartNumbersController@index');
     }
}
