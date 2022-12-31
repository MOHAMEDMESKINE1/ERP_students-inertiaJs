<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelSchoolRequest;
use App\Models\SchooLevel;
use Illuminate\Http\Request;

class SchooLevelController extends Controller
{
    //

    public function index(){
        
        // $levels =  SchooLevel::orderBy('name','asc')->paginate(2);
        $levels =  SchooLevel::orderBy('name','desc')->paginate(4);

        return inertia('SchoolLevel/Index',compact('levels'));
    }

    public function create(){
        
        return inertia('SchoolLevel/Create');
    }

    public function store(LevelSchoolRequest $request){

        // $request->validate(["name"=> "required|unique:schoo_levels"]);

        SchooLevel::create([ "name"=>$request->name ]);

        return redirect()->route('schoolevel.index')->with('message','Level Added succefully ');
    }

    public function edit($id){
        
        $level = SchooLevel::find($id);

        return inertia('SchoolLevel/Edit',compact('level'));
    }

    public function update(LevelSchoolRequest $request,$id){
        
        // $level = SchooLevel::where('id',$id)->first();
        // $level->name= $request->name;
        // $level->save();

        // $request->validate(["name"=> "required|unique:schoo_levels"]);

        $level = SchooLevel::find($id);

        $level->update(['name'=>  $request->name]);
        

        return redirect()->route('schoolevel.index')->with('message','Level Updated succefully');
    }
    public function destroy(SchooLevel $level,$id){

        $level->destroy($id);

        return redirect()->route('schoolevel.index')->with('message','Level deleted succefully');
    }
   
}
