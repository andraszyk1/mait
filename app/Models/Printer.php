<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{

    protected $fillable = [
        'name',
        'ip',
        'location',
        'location_id',
        'sn',
        'type',
        'licznik',
        'label_type',
        'ribbon_type'
        ];
		public function layouts(){
			return $this->belongsToMany(Label_layout::class,'layout_printers');
		}

        public function place()
        {
            return $this->belongsTo(Location::class, 'location_id' );
        }

}
