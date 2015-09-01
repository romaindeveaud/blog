<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class PostController extends Controller {

  public function index (Request $request) {
    $posts = Post::query()->get()->forPage(1,10)->all();

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
