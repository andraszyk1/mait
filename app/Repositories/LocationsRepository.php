<?php
namespace App\Repositories;

use App\Models\Location;

class LocationsRepository extends BaseRepository{

    public function __construct(Location $model){
        $this->model=$model;
    } 

}