<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Entities\School as SchoolEloquent;
use App\Entities\Department as DepartmentEloquent;

class College extends Model
{
    protected $table = 'college';

    public function school(){
        return $this->hasMany(SchoolEloquent::class); //一個學院只能是一個學校的
    }

    public function department(){
        return $this->belongsTo(departmentEloquent::class); //一個學院可以有多個系所
    }
}
