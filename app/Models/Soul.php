<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soul extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'church_id',
        'group_id',
        'pcf_id',
        'cell_id',
        'bscg_id',

        'soul_winner_id',
        
        'soul_name',
        'email',
        'contact', 
        'residence',
        
        
    ];

public function zone(){
return $this->belongsTo(Zone::class);
}

public function church(){
return $this->belongsTo(Church::class);
}

public function group(){
return $this->belongsTo(Group::class);
}

public function pcf(){
return $this->belongsTo(Pcf::class);
}

public function cell(){
return $this->belongsTo(Cell::class);
}

public function bscg(){
    return $this->belongsTo(Bscg::class);
    }

public function soul_winner(){
return $this->belongsTo(SoulWinner::class);
}

public function designation(){
return $this->belongsTo(Designation::class);
}
}
