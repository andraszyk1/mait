<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintOut extends Model
{

    protected $fillable = [
        'id',
        'users_id',
        'admin_id',
        'parts_numbers_id',
        'printers_id',
        'labels_layouts_id',
        'labels_count',
        "last_sn"
        
    
    ];

 
        public function user()
        {
            return $this->belongsTo(User::class, 'users_id' );
        }

        public function parts_number()
        {
            return $this->belongsTo(PartsNumber::class, 'parts_numbers_id' );
        }
        public function printer()
        {
            return $this->belongsTo(Printer::class, 'printers_id' );
        }
        public function labels_layouts()
        {
            return $this->belongsTo(Label_layout::class, 'labels_layouts_id' );
        }
     
   

}
