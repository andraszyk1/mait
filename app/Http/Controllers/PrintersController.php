<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PrintersRepository;
use App\Models\Printer;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class PrintersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index (PrintersRepository $printerRepo){
        if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
            return redirect()->route('login');
         }


        $drukarki=$printerRepo->getAll1();
        return view('printers.list',[
        'printersList'=>$drukarki,
        "footerYear"=>date('Y'),
        "title"=>"Printers"]);
    }

    public function create(){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }

        return view('printers.create',["footerYear"=>date('Y'),
        "title"=>"Create Printer"]);
    }
    public function delete(PrintersRepository $printerRepo,$id ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
         $printer=$printerRepo->delete($id);

        return redirect('printers');
        }

    public function store(Request $request ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }

        $printer= new Printer;
        $printer->name=$request->input('name');
        $printer->ip=$request->input('ip');
        $printer->location=$request->input('location');
        $printer->sn=$request->input('sn');
        $printer->licznik=$request->input('licznik');
        $printer->label_type='';
        $printer->ribbon_type='';
        $printer->save();
        return redirect()->action('PrintersController@index');
    }
    public function edit(PrintersRepository $printerRepo,$id){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }
        $printer=$printerRepo->find($id);
        return view('printers.edit',["printer"=>$printer,
        "footerYear"=>date('Y'),
        "title"=>"Printer Edit"]);
     }


    public function editStore(Request $request){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }

        $printer = Printer::find($request->input('id'));
        $printer->name=$request->input('name');
        $printer->ip=$request->input('ip');
        $printer->location=$request->input('location');
        $printer->save();
        return redirect()->action('PrintersController@index')->with('status','Printer Updated');
     }
}
