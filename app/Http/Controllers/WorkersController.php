<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\Handler;

class WorkersController extends Controller
{
   public function __construct(){
      $this->middleware('auth');
   }
   public function index(UserRepository $userRepo){
      if(Auth::user()->type != 'admin'){
         return redirect()->route('login');
      }
   
      $workers = User::All();
	  $statistics=$userRepo->getStatusStatistics(); 
	    return view('workers.list',["workerslist"=>$workers,
									"footerYear"=>date('Y'),
									"title"=>"All Workers",
									"statistics"=>$statistics
									]);
   }

   public function show(UserRepository $userRepo,$id){
      if(Auth::user()->type != 'admin'){
         return redirect()->route('login');
      }
      $worker=$userRepo->find($id);  
	    return view('workers.show',["worker"=>$worker,
									"footerYear"=>date('Y'),
									"title"=>"Worker Card"]);
   }


   public function create(){     
      if(Auth::user()->type != 'admin'){
         return redirect()->route('login');
      } 
 
	    return view('workers.create');
   }

   public function store(Request $request ){
      if(Auth::user()->type != 'admin'){
          return redirect()->route('login');
       }

      $worker= new User;
      $worker->name=$request->input('name');
      $worker->email=$request->input('email');
      $worker->id_hr_sap=$request->input('id_hr_sap');
      $worker->type=$request->input('type');
      $worker->status='active';
      $worker->password=bcrypt($request->input('password'));
      $worker->save();
      return redirect()->action('WorkersController@index');
  }
  public function delete(UserRepository $userRepo,$id ){
   if(Auth::user()->type != 'admin'){
       return redirect()->route('login');
    }
    $worker=$userRepo->delete($id);

   return redirect('workers');
}
   public function edit(UserRepository $userRepo,$id){
      if(Auth::user()->type != 'admin'){
         return redirect()->route('login');
      }
      $worker=$userRepo->find($id);
      return view('workers.edit',["worker"=>$worker,
      "footerYear"=>date('Y'),
      "title"=>"Worker Card"]);
   }
   public function editStore(Request $request ){
      if(Auth::user()->type != 'admin'){
          return redirect()->route('login');
       }
      $worker= User::find($request->input('id'));
      $worker->name=$request->input('name');
      $worker->email=$request->input('email');
      $worker->id_hr_sap=$request->input('id_hr_sap');
      $worker->type=$request->input('type');
      $worker->status=$request->input('status');;
     
      $worker->save();
      return redirect()->action('WorkersController@index');
  }

}
