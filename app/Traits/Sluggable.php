<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable {

    public static function createSlug($text)
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
            return self::createSlug("not-valid-content-" . strval(now()));
        }

        return $text;
    }

    public static function getTitleFromSlug($slug)
    {
        return ucwords(preg_replace('~-~', ' ', $slug));
    }
}
