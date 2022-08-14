<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoulWinner extends Model
{
    use HasFactory;

    protected $fillable = [
                            'zone_id', 
                            'church_id', 
                            'group_id', 
                            'pcf_id', 
                            'cell_id', 
                            'bscg_id', 
                            'designation_id', 

                            'soul_winner_name', 
                            'contact', 
                            'dob', 
                            'email', 
                            
                            'location'
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

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function souls(){
        return $this->hasMany(Soul::class);
    }

    // public function members_of_departments(){
    //     return $this->hasMany(MembersOfDepartment::class);
    // }
}
