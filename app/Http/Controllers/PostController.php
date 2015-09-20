<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class PostController extends Controller {

  public function index (Request $request) {
    $posts = Post::query()->where('is_draft', 'false')
                          ->orderBy('created_at','desc')
                          ->get()->forPage(1,10)->all();

    foreach($posts as $post)
      $post->author = $post->getAuthor();

    return view('index', ['posts' => $posts]);
  }

  public function show_with_id (Request $request, $id) {
    $post = Post::query()->findOrFail($id);
    $post->count_read += 1;
    $post->save();

    $post->author = $post->getAuthor();
    return view('post.index', [ 'post' => $post ]);
  }

  public function show (Request $request, $urlified_title) {
    $post = Post::query()->where('urlified_title', $urlified_title)->first();
    $post->count_read += 1;
    $post->save();

    $post->author = $post->getAuthor();
    return view('post.index', [ 'post' => $post ]);
  }

  public function new_post (Request $request) {
    $post = new Post();
    $post->author_id  = Auth::user()->id;
    $post->is_draft = true;
    $post->save();

    return view('post.create', ['post_id' => $post->id ]);
  } 

  public function create (Request $request) {
    /*
    $this-validate($request, [
      'title' => 'required',
      'content' => 'required',
      ]);
     */
    $post = $this->update($request, $request->input('_post_id'));

    $is_draft = $request->input('_submit');

    if($is_draft == "publish")
      $post->is_draft = false;

    $post->save();

    $redirect = $post->is_draft ? "/edit/$post->id" : "/post/$post->id" ;

    return redirect($redirect);
  }

  public function update ($request, $id) {
    $post = Post::query()->findOrFail($id);
    $post->title = $request->input('title');
    $post->urlified_title = Post::slugifyTitle($request->input('title'));
    $post->content = "\n" . $request->input('content');

    return $post;
  }

  public function delete ($id) {
    Post::destroy($id);
    return redirect('/dashboard');
  }

  /** Asynchronous methods. */

  public function save_draft(Request $request) {
    $post = $this->update($request, $request->input('_post_id'));
    $post->save();
  }

  public function image_bg_upload(Request $request) {
    $post = Post::query()->findOrFail($request->input('post_id'));
    $img = $post->id . "-bg." . $request->file('image-bg')->getClientOriginalExtension();
    $post->image = "upload/$img" ;
    $post->save();
    $request->file('image-bg')->move(public_path('img').'/upload', $img);

    return "{ }";
  }
  public function image_upload(Request $request) {
    $request->file('image-bg')->move(public_path('img').'/upload', $request->input('post_id') . ".jpg");
    return "{}";
  }
}
