<?php
namespace App\Repositories;
use DB;
use App\Models\User;

class UserRepository extends BaseRepository{

    public function __construct(User $model){
        $this->model=$model;
    }

    public function getAllUsers(){
        return $this->model->where('type','user')->orderBy('name','asc')->get();
    }

    public function getAllAdmins(){
        return $this->model->where('type','admin')->orderBy('name','asc')->get();
    }

	public function getStatusStatistics(){
        return DB::table('users')->select(DB::raw('count(*) as user_count, status'))->groupBy('status')->get();
    }
}
