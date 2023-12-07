<?php 
namespace App\Http\Reposirtory;

use App\Http\Interfaces\SettingsRepositoryInterface;
use App\Models\OnlineCourse;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use App\Http\Traits\MeetingZoomTrait;
use App\Http\Traits\UploadFileTrait;
use App\Models\Setting;

class SettingsRepository implements SettingsRepositoryInterface{
   
    use FlashMessageTrait;
    use UploadFileTrait;
    public function getAllSettings()
    {
        $collection = Setting::all();
        $settings = $collection->flatMap(function($collection){
            return [$collection->key => $collection->value];
        });
        return view("dashboard.settings")->with("settings",$settings);
    }

    public function update(Request $request){
        try {

           $info = $request->except(['_method','_token' ,'chat_image','logo_image']);
           
           foreach($info as $key=>$value)
           {
            Setting::where('key',$key)->update(['value'=>$value]);
           }

           if($request->has('chat_image'))
           {
            $chat_image = $request->file('chat_image')->getClientOriginalName();
            $old_image = Setting::where('key','chat_image')->pluck('value');
            $old_image = $old_image[0];
            $this->deleteFile($old_image,'settings');
            Setting::where('key','chat_image')->update(['value'=>$chat_image]);
            $this->uploadFile($request,'chat_image','settings');
           }

           if($request->has('logo_image'))
              {  
                $logo_image = $request->file('logo_image')->getClientOriginalName();
                $old_image = Setting::where('key','logo_image')->pluck('value');
                $old_image = $old_image[0];
                $this->deleteFile($old_image,'settings');
               Setting::where('key','logo_image')->update(['value'=>$logo_image]);
               $this->uploadFile($request,'logo_image','settings');
           }
            $this->SuccessMsg("settings updated ");
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
           

            dd($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}