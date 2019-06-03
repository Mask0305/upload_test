<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Entities\College as CollegeEloquent;
use App\Entities\Education_System as EducationSystemEloquent;

class Department extends Model
{
    protected $table = 'department';

    public function college(){
        return $this->hasMany(CollegeEloquent::class); //一個系所只能是一個學院的
    }

    public function education_system(){
        return $this->belongsToMany(EducationSystemEloquent::class); //每個系所可以有多種學制
    }
}
