<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MonitorsRepository;
use App\Models\Monitor;
use Illuminate\Support\Facades\Auth;

class MonitorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function index (MonitorsRepository $monitorRepo){
        if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
            return redirect()->route('login');
         }


        $monitory=$monitorRepo->getAll1();
        return view('monitor.list',['monitorList'=>$monitory,
        "footerYear"=>date('Y'),
        "title"=>"Monitors"]);
    }
}
