<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label_layout extends Model
{

    protected $fillable = [
        'name',
        'project',
        'owner',
        'zpl'];

        public function label_layoutPrintOuts(){
            return $this->hasMany(PrintOut::class,'labels_layouts_id');
        } 
        public function user()
        {
            return $this->belongsTo(User::class, 'owner' );
        }
		public function printers(){
			return $this->belongsToMany(Printer::class,'layout_printers');
		}
		public function partsnumbers(){
			return $this->belongsToMany(PartsNumber::class,'pn_layouts');
		}
}
