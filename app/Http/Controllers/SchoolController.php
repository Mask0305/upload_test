<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Route;
use View;
use App\Repositories\SchoolRepository;

class SchoolController extends Controller
{
    protected $schoolRepo;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepo = $schoolRepo;
    }

    public function getIndex()
    {
        return View::make('btschool');
        
    }

    public function schools(){
        $school = $this->schoolRepo->getschools();              //校名
        // $college = $this->schoolRepo->getcollege();             //學院
        // $department = $this->schoolRepo->getdepartment();       //科系.
        // $education = $this->schoolRepo->geteducation();         //學制
        // return $school;
        // return View::make('btschool',['data'=>$school]);
        // return View::make('btschool',['data1'=>$school,'data2'=>$college,'data3'=>$department]);
        return $school;
    }
}
