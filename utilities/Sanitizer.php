<!-- Write your sanitization code here. -->
<?php 
class Sanitizer {
    private static $name_chars = '/([^a-zA-Z\-. ]+)/';
    private static $file_chars = '/([^a-zA-Z0-9\-_.]+)/';
    
    public static function filter_input($string, $special_chars = '//') {
        $trim_space = trim($string);
        $strip_tags = strip_tags($trim_space);
        $remove_chars = preg_replace($special_chars, '', $strip_tags);
        return $remove_chars;
    }

    public static function format_name($name) {
        $filtered = self::filter_input($name, self::$name_chars);
        $lowercase = strtolower($filtered);
        $capitalized = ucwords($lowercase);
        return $capitalized;
    }

    public static function filter_file($input_file, $files_array) {
        $filtered = self::filter_input($input_file, self::$file_chars);
        $file_name = strtolower($filtered);

        foreach ($files_array as $item_name) {
        if ($item_name == $file_name) {
            return $file_name;
            }
        }
    }

    public static function filter_number($number) {
        $filter_int = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
        return (int) $filter_int;
    }

    public static function escape_html($string) {
        $convert_charset = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
        $encode_html = htmlspecialchars($convert_charset, ENT_QUOTES, 'UTF-8');
        return $encode_html;
    }
}