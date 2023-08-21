<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;



class LoggedController extends Controller
{

     /* PROJECT SHOW */

    public function show($id){

        $project = Project :: FindOrFail($id);

        return view("logged.showProject", compact("project"));
    }


    /* PROJECT CREATE */

    public function create(){

        $types = Type :: all();
        $technologies = Technology :: all();

        return view("logged.createProject", compact("types", "technologies"));

        }

    /* STORE */

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|file|max:2048',
            'budget' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type_id' => 'required',
            'difficulty' => 'required',
        ],

    );

        $data =  $request -> all();

        $img_path = Storage::put("uploads", $data["image"]);

        $data["image"] = $img_path;

         $project = Project :: create($data);
         $project -> technologies() -> attach($data["technologies"]);

        return redirect() -> route("logged.showProject", $project -> id);
    }


    /* EDIT */

    public function edit($id){


        $project = Project :: FindOrFail($id);
        $types = Type :: all();
        $technologies = Technology :: all();

        return view("logged.editProject", compact("project", "types", "technologies"));
        }


        /* UPDATE */

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'budget' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type_id' => 'required',
            'difficulty' => 'required',
        ]);

            $data = $request -> all();

            $project = Project :: findOrFail($id);

            $project -> update($data);

            if(array_key_exists("technologies", $data))
            $project -> technologies()-> sync($data["technologies"]);

            else
            $project -> technologies()->detach();

            return redirect() -> route('logged.showProject', $project -> id);
        }


    /* DELETE */

    public function delete($id) {
        $project = Project::findOrFail($id);

        $project->technologies()->detach();
        $project->delete();

        return redirect()->route("home");
    }
}



