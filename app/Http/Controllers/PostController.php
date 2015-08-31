<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class PostController extends Controller {

  public function index () {
    $posts = Post::query()->get()->forPage(1,10)->all();
    return view('index', ['posts' => $posts]);
  }

  public function show ($id) {
    $post = Post::query()->findOrFail($id);
    return view('post.index', ['post' => $post]);
  }

  public function create (Request $request) {
    if(empty($request->session()->get('current_author'))) {
      // do something, like redirect to the login form.
    }


    $this-validate($request, [
      'title' => 'required',
      'content' => 'required',
      ]);

    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->count_read = 0;
    $post->author_id  = $request->session()->get('current_author');

    $post->save();
  }

  public function update ($id) {
  }

  public function delete ($id) {
  }
}
