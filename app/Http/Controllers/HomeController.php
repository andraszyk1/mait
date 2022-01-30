<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Printer;
use App\Models\Label_layout;
use App\Models\PartsNumber;
use App\Models\PrintOut;
use App\Models\Computer;
use App\Models\Monitor;
use App\Models\Location;
use App\Repositories\ComputersRepository;
use App\Repositories\MonitorsRepository;
use App\Repositories\PrintersRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ComputersRepository $computerRepo,
    MonitorsRepository $monitorRepo,PrintersRepository $printerRepo)
    {

        $latestComputers=$computerRepo->getLatestComputer();
        $latestMonitors=$monitorRepo->getLatestMonitor();
        $latestPrinters=$printerRepo->getLatestPrinter();
        return view('home',["users_count"=>User::count(),
        "layouts_count"=>Label_layout::count(),
        "printers_count"=>Printer::count(),
        "parts_numbers_count"=>PartsNumber::count(),
        "print_outs_count"=>PrintOut::count(),
        "computers_count"=>Computer::count(),
        "monitors_count"=>Monitor::count(),
        "locations_count"=>Location::count(),
        "latestComputersList"=>$latestComputers,
        "latestMonitorsList"=>$latestMonitors,
        "latestPrintersList"=>$latestPrinters
        ]);
    }
}
