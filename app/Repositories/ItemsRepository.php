<?php
namespace App\Repositories;

use App\Models\Item;

class ItemsRepository extends BaseRepository{

    public function __construct(Item $model){
        $this->model=$model;
    } 

}