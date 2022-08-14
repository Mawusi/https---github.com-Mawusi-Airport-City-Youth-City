<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function churches(){
        return $this->hasMany(Church::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function pcfs(){
        return $this->hasMany(Pcf::class);
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
