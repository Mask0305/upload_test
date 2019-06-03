<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Entities\School as SchoolEloquent;
use App\Entities\College as CollegeEloquent;
use App\Entities\Department as DepartmentEloquent;

class Education_System extends Model
{
    protected $table = 'education_system';

    public function department(){
        return $this->belongsToMany(departmentEloquent::class); //每個學制可以有多的系所
    }
}
