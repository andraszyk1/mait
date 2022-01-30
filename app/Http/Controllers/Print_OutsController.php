<?php

namespace App\Http\Controllers;
use App\Classes\RfidClass;
use Illuminate\Http\Request;
use App\Models\PrintOut;
use App\Models\Label_layout;
use App\Models\Printer;
use App\Models\PartsNumber;
use Illuminate\Support\Facades\DB;
use App\Repositories\PrintOutsRepository;
use App\Repositories\PartsNumbersRepository;
use App\Repositories\LayoutsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class Print_OutsController extends Controller
{
     public function __construct(){
          $this->middleware('auth');
       }
    public function index(PrintOutsRepository $printOutRepo){
    
         $wydruki = $printOutRepo->getAll1();  
         return view('print_outs.list',["print_outsList"=>$wydruki,
                                      "footerYear"=>date('Y'),
                                      "title"=>"All Print Outs"]);
     }

     public function create(){     
         if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
             return redirect()->route('login');
          } 
      
        

          $layouts = Label_layout::orderBy('name')->get();
          $printers = Printer::orderBy('name')->get();
          $partsnumbers = PartsNumber::orderBy('name')->get();
          $Latest_print_out = PrintOut::latest()->first();
          return view('print_outs.create',[
               'layoutsList'=>$layouts,
               'printersList'=>$printers,
               'partsnumbersList'=>$partsnumbers,
               "footerYear"=>date('Y'),
               "title"=>"Create print out",
               "last_sn"=> $Latest_print_out->last_sn
          ]);
       }
    
       public function store(Request $request ){
         $request->validate([
            'labels_count' => 'required|max:3'
          
        ]);
          if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
              return redirect()->route('login');
           }
       
        
           
          $last_snPrintOut=PrintOut::latest()->first()->last_sn;

          $out= new PrintOut;
          $out->users_id=Auth::id();
          $out->admin_id=1;
          $out->parts_numbers_id=$request->input('partsnumbersid');
          $out->labels_count=$request->input('labels_count');
         
   
          $labelid=PartsNumber::with('layouts')->find($request->input('partsnumbersid'))->layouts->first()->id;
          $printid=Label_layout::with('printers')->find($labelid)->printers->first()->id;;
          $out->labels_layouts_id=$labelid;
          $out->printers_id=$printid;
          $out->last_sn=$last_snPrintOut+$request->input('labels_count');
          $out->save();
          return redirect()->action('Print_OutsController@index');
      //    return view('print_outs.store',[
      //    'ilosc_etykiet'=>$ile,
      //    'zpls'=>$zpls,
      //    'barcode'=>$barcode,
      //    'rfid_ascii'=> $rfid_ascii,
      //    'rfid_hex'=> $rfid_hex

      //    ]);
      }
}
