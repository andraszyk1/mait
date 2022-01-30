<?php
namespace App\Repositories;

use App\Models\PrintOut;

class PrintOutsRepository extends BaseRepository{

    public function __construct(PrintOut $model){
        $this->model=$model;
    } 
}
