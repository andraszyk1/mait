<?php
namespace App\Repositories;

use App\Models\PartsNumber;

class PartsNumbersRepository extends BaseRepository{

    public function __construct(PartsNumber $model){
        $this->model=$model;
    } 




}
