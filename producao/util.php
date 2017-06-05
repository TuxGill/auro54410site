<?php
function clean($string) {
 $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

 return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}


 function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

?>
