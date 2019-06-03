<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use Route;
use View;
use App\Entities\School;
use App\Entities\College;
use App\Entities\Department;
use App\Entities\Education_System;
use Illuminate\Support\Facades\DB;

class SchoolRepository
{
    public function getschools()
    {
        // $result = School::all();

        // return $result;
         $result = DB::table('department')
                    ->join('school','department.schoolId','=','school.schoolId','left outer')
                    ->join('college','department.collegeId','=','college.collegeId','left outer')
                    ->join('education_system','department.educationSystemId','=','education_system.educationSystemId','left outer')
                    ->get();
        return $result;
    }

    // public function getcollege()
    // {
    //     $result = College::all();
    //     return $result;
    // }

    //  public function getdepartment()
    // {
    //     $result = Department::all();
    //     return $result;
    // }

    //  public function geteducation()
    // {
    //     $result = Education_System::all();
    //     return $result;
    // }

    // public function getschools()
    // {
    //     $result = School::with('college')->get();
    //     return $result;
    // }



    

}
