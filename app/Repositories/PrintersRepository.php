<?php
namespace App\Repositories;

use App\Models\Printer;

class PrintersRepository extends BaseRepository{

    public function __construct(Printer $model){
        $this->model=$model;
    }
    public function getLatestPrinter(){
        return $this->model->orderBy('created_at', 'desc')->take(1)->get();
    }
    public function getStatisticsByLocation(){
        return $this->model->select(DB::raw('count(*) as printer_in_location, location_id'))->groupBy('location_id')->get();
    }
}
