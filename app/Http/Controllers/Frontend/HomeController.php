<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $blogs['blogs'] = Blogs::all()->sortBy('blog_must');
        $user = User::where('id', 5)->first();
        return view('frontend2.layout',compact('user','blogs'));
    }

    public function detail($slug){
        $blogList = Blogs::all()->sortBy('blog_must');
        $blog =  Blogs::where('blog_slug' ,$slug)->first();
        $user = User::where('id', 34)->first();
        return view('frontend2.project-detail',compact('blog','blogList','user'));
    }
}
