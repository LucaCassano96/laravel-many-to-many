<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class GuestController extends Controller
{

/* HOME */

    public function index(){

        $projects = Project :: all();
        $projects = Project::orderBy('created_at', 'desc')->get();

        return view("home", compact("projects"));
    }


}
