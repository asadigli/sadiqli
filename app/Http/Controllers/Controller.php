<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Blog;
use App\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
      $cat = Category::all();
      $blogs = Blog::orderBy('created_at','desc')->take(8)->get();
      return view('index',compact('cat','blogs'));
    }
    public function contact(){
      return view('contact');
    }
    public function search(){
      return view('search');
    }
    public function suggest(){
      return view('suggest');
    }
    public function about(){
      return view('about');
    }
    public function blog($slug){
      $blog = Blog::where('slug',$slug)->first();
      $view = new View;
      $view->blog_id = $blog->id;
      $view->user_ip = \Request::ip();
      $view->save();
      return view('blog',compact('blog'));
    }
    public function notfound(){
      return view('404');
    }
}
