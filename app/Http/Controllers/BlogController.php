<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sortable(){
        //print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value){
            $blog = Blogs::find(intval($value));//ajax üzerinden veri string geliyor.find ise integer ile çalışıyor.
            $blog->blog_must = intval($key);
            $blog->save();
        }
        echo true;
    }

    public function index()
    {
        $data['blog'] = Blogs::all()->sortBy('blog_must');
        return view('backend.blogs.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(strlen($request->blog_slug)>3){
            $slug = Str::slug($request->blog_slug);
        }else{
            $slug = Str::slug($request->blog_title);
        }

        if($request->hasFile('blog_file')){
            $request->validate([
                'blog_title' => 'required',
               'blog_content' => 'required',
               'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name = uniqid().".".$request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'),$file_name);
        }else{
            $file_name = null;
        }

        $blog = Blogs::create([
           'blog_title' => $request->blog_title,
           'blog_slug' => $slug,
           'blog_content' => $request->blog_content,
           'blog_status' => $request->blog_status,
            'blog_file' => $file_name
        ]);


        if($blog){
            return redirect(route('blog.index'))->with('success','Kayıt işlemi başarılı');
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
        $blog = Blogs::where('id',$id)->first();
        return view('backend.blogs.edit')->with('blog',$blog);
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
        if(strlen($request->blog_slug)>3){
            $slug = Str::slug($request->blog_slug);
        }else{
            $slug = Str::slug($request->blog_title);
        }

        if($request->hasFile('blog_file')){
            $request->validate([
               'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'blog_title' => 'required',
                'blog_content' => 'required'
            ]);
            $file_name = uniqid().'.'.$request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('/images/blogs'),$file_name);

            $blog = Blogs::where('id',$id)->update([
                'blog_title' => $request->blog_title,
                'blog_slug' => $slug,
                'blog_content' => $request->blog_content,
                'blog_status' => $request->blog_status,
                'blog_file' => $file_name
            ]);

            //önce resmin yolunu çekeriz
            //sonra file_exists metodu ile resim o yolda mevcutmu diye kontrol sağlarız.
            $path = 'images/blogs/'.$request->old_file;//burada resim güncellendikten sonra önceki resim var ise o resmin silinmesini sağlar.
            if(file_exists($path)){
                @unlink(public_path($path));//unlink silmeyi sağlar
            }
        }
        else{
            $blog = Blogs::where('id',$id)->update([
                'blog_title' => $request->blog_title,
                'blog_slug' => $slug,
                'blog_content' => $request->blog_content,
                'blog_status' => $request->blog_status
            ]);
        }

        if($blog){
            return redirect(route('blog.index'))->with('success','Düzenleme işlemi başarılı');
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
        $blog = Blogs::find(intval($id));
        if($blog->delete()){
            echo 1;
        }
        echo 0;
    }
}
