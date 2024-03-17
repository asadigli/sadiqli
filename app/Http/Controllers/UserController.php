<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Comment;
use App\Subscription;
use App\Like;
use App\Notify;
use App\Page;

class UserController extends Controller
{
    public function tocontact(Request $req){
      $contact = new Contact;
      $contact->full_name = $req->name;
      $contact->type = 0;
      $contact->email = $req->email;
      $contact->title = $req->title;
      $contact->contact_ip = \Request::ip();
      $contact->message = $req->message;
      $contact->save();
      return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
    }
    public function getpage($slug){
      $page = Page::where('slug',$slug)->first();
      return view('page',compact('page'));
    }
    public function addnewcomment(Request $req){
      $co = Comment::where('blog_id',$req->blog_id)->where('email',$req->email)->where('comment',$req->comment)->first();
      if (empty($co)) {
        $comm = new Comment;
        $comm->name = $req->name;
        $comm->blog_id = $req->blog_id;
        $comm->reply_id = $req->reply_id;
        $comm->user_ip = \Request::ip();
        $comm->token = md5(microtime());
        $comm->comment = $req->comment;
        $comm->email = $req->email;
        $comm->save_me = 0;
        $comm->save();
        $com_m = Comment::orderBy('created_at','desc')->where('user_ip',\Request::ip())->first();
          $not = new Notify;
          $not->type = "comment";
          $not->comment_id = $com_m->id;
          $not->token = md5(microtime());
          $not->blog_id = $req->blog_id;
          $not->save();
        return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
      }else {
        $com = Comment::where('email',$req->email)->where('name',$req->name)->orderBy('created_at','DESC')->first();
        $com->token = md5(microtime());
        $com->update();
        return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
      }
    }
    public function addnewsubscription(Request $req){
      $sb = Subscription::where('type','=',"blog")->where('email',$req->email)->first();
      if (empty($sb)) {
        $subs = new Subscription;
        $subs->user_ip = \Request::ip();
        $subs->type = "blog";
        $subs->status = 1;
        $subs->email = $req->email;
        $subs->save();
          $not = new Notify;
          $not->type = "subscibe";
          $not->subscriber = $req->email;
          $not->token = md5(microtime());
          $not->save();
        return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
      }else{
        $sus = Subscription::where('id',$sb->id)->first();
        $sus->status = 1;
        $sus->update();
        return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
      }
    }
    public function likeblog(Request $req){
        $like_m = Like::where('email',$req->eblog_liker)->where('blog_id',$req->bl_id)->first();
        if (empty($like_m)) {
          $like = new Like;
          $like->blog_id = $req->bl_id;
          $like->commenter = $req->blog_liker;
          $like->email = $req->eblog_liker;
          $like->user_ip = \Request::ip();
          $like->token = md5(microtime());
          $like->save();
            $lk = Like::where('email',$req->eblog_liker)->where('blog_id',$req->bl_id)->first();
            $not = new Notify;
            $not->type = "like";
            $not->like_id = $lk->id;
            $not->token = md5(microtime());
            $not->blog_id = $req->blog_id;
            $not->save();
          return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
        }else{
          $lik = Like::where('blog_id',$req->bl_id)->where('email',$req->eblog_liker)->first();
          $lik->user_ip = \Request::ip();
          $lik->token = md5(microtime());
          $lik->update();
          return response()->json(['success'=>'Data is successfully added','error' => 'Failed']);
        }
    }
}
