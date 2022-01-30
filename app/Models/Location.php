<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function modifiedby()
    {
        return $this->belongsTo(User::class,'modifiedby_id');
    }
    public function Items(){
        return $this->hasMany(Item::class,'location_id');
    }
    public function Printers(){
        return $this->hasMany(Printer::class,'location_id');
}
}
