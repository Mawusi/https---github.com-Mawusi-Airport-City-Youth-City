<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersOfDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id', 
        'church_id', 
        'group_id', 
        'pcf_id', 
        'cell_id', 
        'bscg_id', 
        'department_id', 

        'member_name', 
        'contact', 
        'dob', 
        'email', 
        'residence'
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

public function department(){
    return $this->belongsTo(Department::class);
}


}
