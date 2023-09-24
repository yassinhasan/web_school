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
        $parents =  User::with('students')->get()->toQuery()->paginate(10);
        $students = Student::all();
        //  return json_encode($parents,JSON_PRETTY_PRINT);
        return view("parents.parents")->with(['parents' => $parents, "students" => $students]);
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

        // if (! $User->items->contains($newItem->id)) {
        //     $cart->items()->save($newItem);
        // }
        
        // Form validation
        
        $validated =  Validator::make($request->all(), [
            'user_id' => 'required',
            'student_id' => 'required',

        ]);
        if (!$validated->stopOnFirstFailure()->fails()) {
            $hasnStudent = User::find($request->user_id)->students->contains($request->student_id);
            if($hasnStudent) {
                toastr()->error('this parent has this user before!');

            }else{

                $parent = new ParentModel();
                $parent->user_id = $request->user_id;
                $parent->student_id = $request->student_id;
                //  Store data in database
                $parent->save();
                toastr()->success('Data has been saved successfully!');
            }
        } else {
            toastr()->error('something error!');
        }


        return redirect()->route('parents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentModal  $parent
     * @return \Illuminate\Http\Response
     */
    public function show(ParentModel $parent)
    {
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
           // check if parent has students first 
           $hasnStudents = User::find($request->id)->students;
           
            if(count($hasnStudents)){
                toastr()->error('sorry you can not delete this parent you shoud delete students first!');

            }else{
                
                User::findOrFail($request->id)->delete();
                toastr()->success('Parent has been deleted successfully!');
            }
            return redirect()->route('parents.index');
        } catch (\Exception $e) {
            report($e);
        }
    }
    public function search(Request $request)
    {
        try {
            $validated =  Validator::make($request->all(), [
                'name' => 'required',    
            ]);
            if ($validated->stopOnFirstFailure()->fails()) {
                toastr()->error('you shoud enter search data');
                return redirect()->back();

 
            }else{
                
                // check if parent has students first 
                $keyword = $request->name;
     
                $selected_parents = User::whereHas(
                 'students',function($query) use($keyword){
                          $query->where('first_name', 'LIKE', "%$keyword%")
                        ->orWhere('last_name', 'LIKE', "%$keyword%");
                    }
                )
                ->orWhere('name', 'LIKE', "%$keyword%")
                                  ->get(); 
               
                // dd($selected_parents);  
                 if(count($selected_parents) == 0){
                     toastr()->error('no parent or student matched');
                 }
                 $parents =  User::with('students')->get()->toQuery()->paginate(10);
                 $students = Student::all();
                 return view("parents.parents")->with(['parents' => $parents, 'selected_parents' => $selected_parents, "students" => $students]);
            }

        } catch (\Exception $e) {
            dd($e);
            report($e);
        }
    }
}
