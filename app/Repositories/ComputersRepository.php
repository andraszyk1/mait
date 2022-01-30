<?php
namespace App\Repositories;
use DB;
use App\Models\Computer;

class ComputersRepository extends BaseRepository{

    public function __construct(Computer $model){
        $this->model=$model;
    }
    public function getLatestComputer(){
    return $this->model->orderBy('created_at', 'desc')->take(1)->get();
    }
}
