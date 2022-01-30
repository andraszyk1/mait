<?php

namespace App\Http\Controllers;
use App\Repositories\LayoutsRepository;
use Illuminate\Http\Request;
use App\Models\Label_layout;
use App\Models\User;
use App\Models\Printer;

use Illuminate\Support\Facades\Auth;

class LayoutsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index (LayoutsRepository $layoutRepo){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
        
 
         
        $labels_layouts=$layoutRepo->getAll1();
        return view('labels_layouts.list',['labels_layoutsList'=>$labels_layouts,
        "footerYear"=>date('Y'),
        "title"=>"Labels Layouts"]);
    }
    public function create(){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
        $printers=Printer::all();
        return view('labels_layouts.create',
        ["footerYear"=>date('Y'),
        "title"=>"Create Part Number",
        "printers"=>$printers]);
    }

    public function store(Request $request ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
        $label_layout= new Label_layout;
        $label_layout->name=$request->input('name');
        $label_layout->project=$request->input('project');
        $label_layout->zpl=$request->input('zpl');
        $label_layout->owner=Auth::id();
        $label_layout->created_at=date("d-m-Y H:i:s");;
        $label_layout->save();
        $label_layout->printers()->sync($request->input('printers'));
        return redirect()->action('LayoutsController@index');
    }
     
    public function delete(LayoutsRepository $layoutRepo,$id ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
         $layout=$layoutRepo->delete($id);
    
        return redirect('layouts');
    }

    public function edit(LayoutsRepository $layoutRepo,$id){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }
        $printers=Printer::all();
        $layout=$layoutRepo->find($id);
        return view('labels_layouts.edit',["layout"=>$layout,
        "footerYear"=>date('Y'),
        "title"=>"Worker Card",
        "printers"=>$printers]);
     }

     
    public function editStore(Request $request){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }
 
        $label= Label_layout::find($request->input('id'));
        $label->name=$request->input('name');
        $label->project=$request->input('project');
        $label->zpl=$request->input('zpl');
        $label->owner=Auth::id();
        $label->save();
        $label->printers()->sync($request->input('printers'));
        return redirect()->action('LayoutsController@index');
     }

}
