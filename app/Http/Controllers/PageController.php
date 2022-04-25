<?php

namespace App\Http\Controllers;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**nwe
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sortable(){
        //print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value){
            $page = Pages::find(intval($value));//ajax üzerinden veri string geliyor.find ise integer ile çalışıyor.
            $page->page_must = intval($key);
            $page->save();
        }
        echo true;
    }

    public function index()
    {
        $data['page'] = Pages::all()->sortBy('page_must');
        return view('backend.pages.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(strlen($request->page_slug)>3){
            $slug = Str::slug($request->page_slug);
        }else{
            $slug = Str::slug($request->page_title);
        }

        if($request->hasFile('page_file')){
            $request->validate([
                'page_title' => 'required',
               'page_content' => 'required',
               'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name = uniqid().".".$request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('images/pages'),$file_name);
        }else{
            $file_name = null;
        }

        $page = Pages::create([
           'page_title' => $request->page_title,
           'page_slug' => $slug,
           'page_content' => $request->page_content,
           'page_status' => $request->page_status,
            'page_file' => $file_name
        ]);


        if($page){
            return redirect(route('page.index'))->with('success','Kayıt işlemi başarılı');
        }
        return back()->with('error','Kayıt işlemi başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Pages::where('id',$id)->first();
        return view('backend.pages.edit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(strlen($request->page_slug)>3){
            $slug = Str::slug($request->page_slug);
        }else{
            $slug = Str::slug($request->page_title);
        }

        if($request->hasFile('page_file')){
            $request->validate([
               'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'page_title' => 'required',
                'page_content' => 'required'
            ]);
            $file_name = uniqid().'.'.$request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('/images/pages'),$file_name);

            $page = Pages::where('id',$id)->update([
                'page_title' => $request->page_title,
                'page_slug' => $slug,
                'page_content' => $request->page_content,
                'page_status' => $request->page_status,
                'page_file' => $file_name
            ]);

            //önce resmin yolunu çekeriz
            //sonra file_exists metodu ile resim o yolda mevcutmu diye kontrol sağlarız.
            $path = 'images/pages/'.$request->old_file;//burada resim güncellendikten sonra önceki resim var ise o resmin silinmesini sağlar.
            if(file_exists($path)){
                @unlink(public_path($path));//unlink silmeyi sağlar
            }
        }
        else{
            $page = Pages::where('id',$id)->update([
                'page_title' => $request->page_title,
                'page_slug' => $slug,
                'page_content' => $request->page_content,
                'page_status' => $request->page_status
            ]);
        }

        if($page){
            return redirect(route('page.index'))->with('success','Düzenleme işlemi başarılı');
        }
        return back()->with('error','Düzenleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find(intval($id));
        if($page->delete()){
            echo 1;
        }
        echo 0;
    }
}
