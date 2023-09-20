<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Http\Requests\StoreParentRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $parents =  User::with('students')->get()->find(auth()->user()->id);

        // $parents =  Student::with('users')->where('id',auth()->user()->id)->get();
        // $parents = ParentModel::with()
      //  return $users;
    //   return $parents;
        return view("parents.parent")->with('parents',$parents);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            // Form validation
            $validated=  Validator::make($request->all(),[
                'user_id' => 'required',
                'student_id' => 'required',

             ]);
             if (!$validated->stopOnFirstFailure()->fails()) {

                 $parent = new ParentModel();
                 $parent->user_id = $request->user_id;
                 $parent->student_id = $request->student_id;
                //  Store data in database
                $parent->save();
                toastr()->success('Data has been saved successfully!');
             }else{
                toastr()->error('something error!');


             }


            return redirect()->route('parents.show');
        
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentModal  $parent
     * @return \Illuminate\Http\Response
     */
    public function show(ParentModel $parent)
    {
        $parents =  User::with('students')->get();
        $students = Student::all();
      //  return json_encode($parents,JSON_PRETTY_PRINT);
          return view("parents.all-parents")->with(['parents'=>$parents,"students"=>$students]);
    }
    public function all(ParentModel $parent)
    {

    }


    public function edit()
    {
        
        return " i will show here table of all parents then update and edit them and add 
        students to them or delete or update info here";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParentRequest  $request
     * @param  \App\Models\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentRequest $request, Parent $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentModal  $parent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            
            
        User::findOrFail($request->id)->delete();

            toastr()->success('Parent has been deleted successfully!');
            return redirect()->route('parents.show');

        } catch(\Exception $e) {
            report($e);
        }
    }
}
