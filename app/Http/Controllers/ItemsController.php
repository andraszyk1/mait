<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\ItemsRepository;
use App\Models\Item;
use App\Models\Location;
use App\Models\Monitor;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
  public function index(ItemsRepository $itemsRepo){
  
       $allItems = $itemsRepo->getAll1();  
       $locations=Location::all();
       return view('items.list',["itemsList"=>$allItems,
       'locationList'=>$locations,
       "footerYear"=>date('Y'),
       "title"=>"Zestawy"]);
   }
   public function create(){     
      if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
          return redirect()->route('login');
       } 
       $users = User::orderBy('name')->get();
       $monitors = Monitor::orderBy('sn')->get();
       $locations = Location::orderBy('name')->get();
       $computers = Computer::orderBy('sn')->get();

       return view('items.create',[
            'userList'=>$users,
            'monitorList'=>$monitors,
            'locationList'=>$locations,
            'computerList'=>$computers,
            "footerYear"=>date('Y'),
            "title"=>"Create print out"
       ]);
    }

    public function store(Request $request ){
       if(Auth::user()->type != 'admin' && Auth::user()->type != 'user' ){
           return redirect()->route('login');
        }

       $item= new Item;
       $item->name=$request->input('name');
       $item->user_id=$request->input('userid');
       $item->computer_id=$request->input('computerid');
       $item->monitor_id=$request->input('monitorid');
       $item->location_id=$request->input('locationid');
       $item->owner_id=Auth::id();
       $item->modifiedby_id=Auth::id();
       $item->nr_inw=$request->input('nr_inw');
       $item->mpk=$request->input('mpk');
       $item->description=$request->input('description');
       $item->save();
       return redirect()->action('ItemsController@index');

   }

}
