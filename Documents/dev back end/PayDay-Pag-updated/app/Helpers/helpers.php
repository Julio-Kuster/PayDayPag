<?php
namespace App\Helpers;

/**
 * Sanitize and normalize a name string:
 * - trim
 * - collapse multiple spaces into one
 * - lowercase then uppercase first letter of each word
 */
function sanitize_name(string $name): string
{
    $name = trim($name);
    // replace multiple whitespace with single space
    $name = preg_replace('/\s+/u', ' ', $name);
    // lowercase and ucwords
    $name = mb_strtolower($name, 'UTF-8');
    $name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');
    return $name;
}
