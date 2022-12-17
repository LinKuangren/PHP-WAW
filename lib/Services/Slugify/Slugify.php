<?php

namespace Plugo\Services\Slugify;

class Slugify
{
    public static function strToSlug(string $str): string {
        return strtolower($str);
    }

}