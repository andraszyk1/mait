<?php
namespace App\Repositories;

use App\Models\Label_layout;

class LayoutsRepository extends BaseRepository{

    public function __construct(Label_layout $model){
        $this->model=$model;
    } 

}
