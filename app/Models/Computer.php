<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    // protected $dateFormat = 'U';
    protected $fillable = [
        'id',
        'owner_id',
        'modifiedby_id',
        'sn',
        'OS',
        'ram',
        'hdd',
        "description"
    ];




        public function owner()
        {
            return $this->belongsTo(User::class,'owner_id');
        }

        public function modifiedby()
        {
            return $this->belongsTo(User::class,'modifiedby_id');
        }
        public function Items(){
            return $this->hasMany(Item::class,'computer_id');
        }

}
