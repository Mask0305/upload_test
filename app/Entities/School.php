<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Entities\College as CollegeEloquent;
use App\Entities\Department as DepartmentEloquent;
use App\Entities\Education_System as EducationSystemEloquent;

class School extends Model
{
    protected $table = 'school';

    public function college(){
        return $this->belongsTo(CollegeEloquent::class); //一個學校可以有多個學院
    }

    // public function department(){
    //     return $this->hasManyThrough(DepartmentEloquent::class,CollegeEloquent::class); //遠層一對多 學校->學院->系所
    // }

    // public function education_system(){
    //     return $this->hasManyThrough(EducationSystemEloquent::class,DepartmentEloquent::class); //遠層一對多 學校->學院->系所->學制
    // }

    
}
