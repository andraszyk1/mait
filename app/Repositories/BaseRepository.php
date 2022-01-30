<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository{

protected $model;

public function getAll1(){
    return $this->model->All();
}
public function paginate($count){
    return $this->model->paginate($count);
}
public function getAll($columns = array('*')){
    return $this->model->get($colums);
}

public function create($data){
    return $this->model->create($data);
}

public function update($data,$id){
    return $this->model->where('id','=',$id)->update($data);
}

public function delete($id){
    return $this->model->destroy($id);
}

public function find($id){
    return $this->model->find($id);
}


}
