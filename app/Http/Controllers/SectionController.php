<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function destroy(Request $request)
    {
        try {
            Section::findOrFail($request->id)->delete();
            toastr()->success('section has been deleted successfully!');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name'=> 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                toastr()->error($validator->errors()->first());
            }
            $section = Section::findOrFail($request->id);
            $section->update([
                $section->name = $request->name
            ]);
            toastr()->success('section has been updated successfully!');
            return redirect()->route('categories.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
