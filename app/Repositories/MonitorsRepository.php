<?php
namespace App\Repositories;

use App\Models\Monitor;

class MonitorsRepository extends BaseRepository{

    public function __construct(Monitor $model){
        $this->model=$model;
    }
    public function getLatestMonitor(){
        return $this->model->orderBy('created_at', 'desc')->take(1)->get();
     }

}
