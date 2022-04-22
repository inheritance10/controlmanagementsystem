<?php

namespace App\Http\Controllers;
use App\Models\Settings;
use http\Env\Request;
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




}
