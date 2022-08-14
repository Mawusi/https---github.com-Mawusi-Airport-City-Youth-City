<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcf extends Model
{
    use HasFactory;

    protected $fillable = ['zone_id', 'church_id', 'group_id', 'name', 'leader_name'];

    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    public function church(){
        return $this->belongsTo(Church::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function cells(){
        return $this->hasMany(Cell::class);
    }

    public function bscgs(){
        return $this->hasMany(Bscg::class);
    }

    public function soul_winners(){
        return $this->hasMany(SoulWinner::class);
    }

    public function souls(){
        return $this->hasMany(Soul::class);
    }

    public function members_of_departments(){
        return $this->hasMany(MembersOfDepartment::class);
    }
}
