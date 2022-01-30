<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\ComputersRepository;
use App\Models\Location;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ComputerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index (){


         $computers=Computer::all();

        // return view('computer.list',['computerList'=>$query->get(),
        return view('computer.list',[
        'computerList'=>$computers,
        "footerYear"=>date('Y'),
        "title"=>"Computers"]);



    }

    public function create(){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }

        return view('computer.create',["footerYear"=>date('Y'),
        "title"=>"Create Computer"]);
    }

    public function delete(ComputersRepository $computerRepo,$id ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }
         $computer=$computerRepo->delete($id);

        return redirect('computer');
        }

    public function store(Request $request ){
        if(Auth::user()->type != 'admin'){
            return redirect()->route('login');
         }

         $request->validate([
            'sn' => 'required|max:30',

        ]);

        $computer= new Computer;
        $computer->model=$request->input('model');
        $computer->sn=$request->input('sn');
        $computer->ram=$request->input('ram');
        $computer->processor=$request->input('processor');
        $computer->hdd=$request->input('hdd');
        $computer->OS=$request->input('OS');
        $computer->owner_id=Auth::id();
        $computer->modifiedby_id=Auth::id();
        $computer->status=$request->input('status');
        $computer->type=$request->input('type');
        $computer->description='';
        $computer->save();
        return redirect()->action('ComputerController@index');
    }
    public function edit(ComputersRepository $computerRepo,$id){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }

        $computer=$computerRepo->find($id);
        return view('computer.edit',[
        "computer"=>$computer,
        "typescomputer"=>array('laptop','pc','terminal','server'),
        "footerYear"=>date('Y'),
        "title"=>"computer Edit"]);
     }


    public function editStore(Request $request){
        if(Auth::user()->type != 'admin'){
           return redirect()->route('login');
        }

        $computer = computer::find($request->input('id'));
        $computer->model=$request->input('model');
        $computer->sn=$request->input('sn');
        $computer->ram=$request->input('ram');
        $computer->processor=$request->input('processor');
        $computer->hdd=$request->input('hdd');
        $computer->OS=$request->input('OS');
        $computer->status=$request->input('status');
        $computer->type=$request->input('type');
        $computer->modifiedby_id=Auth::id();
        $computer->save();
        return redirect()->action('ComputerController@index')->with('status','Computer Updated');
     }


     public function szukaj(Request $request)
     {

        if($request->ajax())
            {
            $output="";
            $filters=$request->query('search');
            $query=Computer::query();
            $users = DB::table('users')->get();

            if(!is_null($filters)){
                if(!is_null($filters['name'])){
                $query=$query->where('model','LIKE','%'.$filters['name']."%");

                }
                if(!is_null($filters['sn'])){
                $query=$query->where('sn','LIKE','%'.$filters['sn']."%");
                }
                if(!is_null($filters['ram'])){
                $query=$query->where('ram','LIKE','%'.$filters['ram']."%");
                }
                if(!is_null($filters['processor'])){
                $query=$query->where('processor','LIKE','%'.$filters['processor']."%");
                }
                if(!is_null($filters['hdd'])){
                $query=$query->where('hdd','LIKE','%'.$filters['hdd']."%");
                }
                if(!is_null($filters['os'])){
                $query=$query->where('OS','LIKE','%'.$filters['os']."%");
                }
                if(!is_null($filters['status'])){
                $query=$query->where('status','LIKE','%'.$filters['status']."%");
                }

            }
            return response()->json([
                'data' =>$query->get()


            ]);

            }
        }
    }



