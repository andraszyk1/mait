<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'computer_id',
        'monitor_id',
        'location_id',
        'owner_id',
        'modifiedby_id',
        'nr_inw',
        'name',
        "mpk"
        
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }
    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id' );
    }
    public function monitor()
    {
        return $this->belongsTo(Monitor::class, 'monitor_id' );
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id' );
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
    
    public function modifiedby()
    {
        return $this->belongsTo(User::class,'modifiedby_id');
    }
}
