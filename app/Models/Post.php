<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Post extends Model {

  public function getAuthor() {
    $author = User::query()->findOrFail($this->author_id);
    return $author;
  }

  /*
  public function save (array $options = array()) {
    if(is_null($this->id)) 
      $this->urlified_title = Post::slugifyTitle($this->title);

    parent::save($options);
  }
   */

  static public function slugifyTitle($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
      return 'n-a';

    return $text;
  }
}
