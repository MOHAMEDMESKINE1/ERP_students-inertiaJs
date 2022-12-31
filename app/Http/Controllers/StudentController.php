<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use App\Models\SchooLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    //
    public function index(Request $request){
        
        // $students = Student::paginate(5)->through(fn($student)=>[
        //     "id"=>$student->id,
        //     "first_name"=>$student->first_name,
        //     "last_name"=>$student->last_name,
        //     "gender"=>$student->gender,
        //     "level"=>$student->school_level,
        // ]);

        $search = $request->search;
        $filter = $request->filter;
        $per_page = $request->per_page;

       $students = Student::with('school_level')
        
       ->when($search , function($query) use($search){
        
            $query->where("first_name",'like','%'.$search.'%');
       })
       ->when($filter , function($query) use($filter){

            $query->where("schoo_level_id",$filter);
       })
       ->latest()

       ->paginate($per_page ?? 5); // if theres selected else slect 5 page by default
       
       $school_level = SchooLevel::orderBy('name','desc')->get();

       $filters = $request->all('search','filter','per_page');
       
        return inertia('Student/Index',compact(['students','school_level','filters']));
    }
    
    public function create(){
        $school_level = SchooLevel::all();

        return inertia('Student/Create',[
            'school_level'=>$school_level
        ]);
       
    }
    public function store (StudentRequest $request){
       
      try {
        DB::beginTransaction();
            $image_path = '';

            if($request->hasFile('photo')){

                $photo =  $request->file('photo');
                $name =
                $image_path = $photo->store('images', 'public');
            }
            Student::create([
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "gender"=>$request->gender,
                "age"=>$request->age,
                "schoo_level_id"=>$request->level_school,
                "photo"=>$image_path
            
        ]);
        DB::commit();
            return redirect()->route('student.index')->with('message','Student created succefully');
       
      } catch (Exception $ex) {
       DB::rollBack();
      }
    }
    public function edit($id){

        $student = Student::find($id);
        
        return inertia('Student/Edit',compact('student'));
    }

    public function update(Request $request, $id){
     
        $validatedData = $request->validate([
        "first_name"=>"required",
        "last_name"=>"required",
        "gender"=>"required",
        "age"=>"required",
        "level_school"=>"required",
      ]);
        
     
        try {
                // $image_path = '';
               $student = Student::find($id);          
    
                // if($request->hasFile('photo')){
    
                //     if(File::exists($student->photo)){
                      
                //         File::delete($student->photo);
                //     }

                //     $photo =  $request->photo;

                //     $student_fullname = $student->first_name.''.$student->last_name;
                    
                //     $filename = str_replace(' ','_',$student_fullname);

                //     $image_path = $photo->storeAs('images',$filename, 'public');
                 
                //     $student->photo = $image_path;
                // }
                $student->update([
                    "first_name"=>$request->first_name,
                    "last_name"=>$request->last_name,
                    "gender"=>$request->gender,
                    "age"=>$request->age,
                    "schoo_level_id"=>$request->level_school,
                    "photo"=>$student->photo
                
                ]);
            return redirect()->route('student.index')->with('message','Student updated succefully');


          

           
          } catch (Exception $ex) {
      
          }
            
        

       

    }
    public function destroy($id){

        $student = Student::find($id);

        $image_path =public_path("storage/".$student->photo);
        if($student->photo){
                
            if(file_exists( $image_path )){

                unlink($image_path);          
               
            }
           
        }

        $student->delete();

       return redirect()->route('student.index')->with('message','Student deleted succefully');
    }
}
