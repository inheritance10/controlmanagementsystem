<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

use function view;

class SettingsController extends Controller
{
    public function index(){
        $settings['adminSettings'] = Settings::all()->sortBy('settings_must');
        return view('backend.settings.index',compact('settings'));
    }
    public function sortable(){
        //print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value){
            $settings = Settings::find(intval($value));//ajax üzerinden veri string geliyor.find ise integer ile çalışıyor.
            $settings->settings_must = intval($key);
            $settings->save();
        }
        echo true;
    }

    public function Destroy($id){
        $settings = Settings::find($id);
        if($settings->delete()){
            return back()->with('success','Silinme işlemi başarılı');
        }
        return back()->with('error','Silme işlemi başarısız');
    }


    public function edit($id){
        $settings = Settings::where('id',$id)->first();
        return view('backend.settings.edit')->with('settings',$settings);
    }

    public function update(Request $request,$id){

        if($request->hasFile('settings_value')){//dosya varlık kontrolü
            $request->validate([
               'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
        }

        $settings = Settings::where('id',$id)->update([
            'settings_value' => $request->settings_value
        ]);
        if($settings){
            return back()->with('success','Düzenleme işlemi başarılı');
        }
        return back()->with('error','Düzenleme işlemi başarısız');
    }
}
