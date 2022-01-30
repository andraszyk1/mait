<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartsNumber extends Model
{

    protected $fillable = [
        'name',
        'project',
        'owner',
        'zpl'];

        public function partnumberPrintOuts(){
            return $this->hasMany(PrintOut::class,'parts_numbers_id');
        } 
		public function layouts(){
			return $this->belongsToMany(Label_layout::class,'pn_layouts');
		}
    
      
}