<?php
use Base\Supports\FlashMessage;
use Category\Models\Category;
use Illuminate\Support\Str;
use Post\Models\Post;
use Product\Models\Product;

if (!function_exists('is_in_dashboard')) {
    /**
     * @return bool
     */
    function is_in_dashboard()
    {
        $segment = request()->segment(1);
        if ($segment === config('SOURCE_ADMIN_ROUTE', 'adminlks')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('menu_url')){
    function menu_url($type,$typeid){
        if($type=='blog'){
           $post = Category::find($typeid);
            return domain_url().'/blog/'.$post->slug;
        }
    }
}

if(!function_exists('percent_price')){
    function percent_price($price,$percent){
        return $price - ($price * ($percent/100));
    }
}

if(!function_exists('price_percent')){
    function price_percent($price,$disprice){
        $percent = ($disprice-$price) / $disprice * 100;
        return floor($percent);
    }
}

if (!function_exists('convert_flash_message')) {
    function convert_flash_message($mess = 'create')
    {
        switch ($mess) {
            case 'create':
                $m = config('messages.success_create');
                break;
            case 'edit':
                $m = config('messages.success_edit');
                break;
            case 'delete':
                $m = config('messages.success_delete');
                break;
            case 'cancel':
                $m = config('messages.cancel');
                break;
            case 'role':
                $m = config('messages.role_error');
                break;
            default:
                $m = config('messages.success_create');
        }

        return $m;
    }
}

if (!function_exists('upload_url')) {
    function upload_url($url){
        return env('APP_URL').'/upload/'.$url;
    }
}
if (!function_exists('public_url')) {
    function public_url($url){
        return env('APP_URL').'/'.$url;
    }
}

if (!function_exists('domain_url')) {
    function domain_url(){
        return env('APP_URL');
    }
}

if (!function_exists('replace_thumbnail')) {
    function replace_thumbnail($thumbnail){
        return str_replace(env('APP_URL').'/public/upload/','',$thumbnail);
    }
}


if (! function_exists('str_slug')) {
    function convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
}
if (! function_exists('str_slug')) {

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return convert_vi_to_en(Str::slug($title, $separator, $language));
    }
}

if (! function_exists('cut_string')) {

    function cut_string($str, $int)
    {
        if(strlen($str)>$int){
            return Str::substr($str,0,$int).'...';
        }else{
            return substr($str,0,$int);
        }

    }
}



if (! function_exists('format_date')) {
    function format_date($date = '')
    {
        return date_format(new DateTime($date), 'd/m/Y');
    }
}
if (! function_exists('get_day_created')) {
    function get_day_created($date = '')
    {
        return date_format(new DateTime($date), 'd');
    }
}

if (! function_exists('get_month_created')) {
    function get_month_created($date = '')
    {
        return date_format(new DateTime($date), 'm');
    }
}

if (! function_exists('get_year_created')) {
    function get_year_created($date = '')
    {
        return date_format(new DateTime($date), 'Y');
    }
}


if (! function_exists('getProduct')) {
    function getProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }
}

if(!function_exists('thousand_format')){
    function thousand_format($number) {
        $number = (int) preg_replace('/[^0-9]/', '', $number);
        if ($number >= 1000) {
            $rn = round($number);
            $format_number = number_format($rn);
            $ar_nbr = explode(',', $format_number);
            $x_parts = array('K', 'M', 'B', 'T', 'Q');
            $x_count_parts = count($ar_nbr) - 1;
            $dn = $ar_nbr[0] . ((int) $ar_nbr[1][0] !== 0 ? '.' . $ar_nbr[1][0] : '');
            $dn .= $x_parts[$x_count_parts - 1];

            return $dn;
        }
        return $number;
    }
}
function convertYoutube($string) {
    return preg_replace(
        "/[a-zA-Z\/\/:\.]*youtu(?:be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)(?:[&?\/]t=)?(\d*)(?:[a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe allowscriptaccess=\"never\" controls=\"0\" frameborder=\"0\" width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/$1?start=$2\" allowfullscreen></iframe>",
        $string
    );
}


function parseVideos($videoString = null)
{
    if (strpos($videoString, 'youtube.com/embed') !== FALSE)
    {
        return $videoString;
    }
    if (strpos($videoString, 'iframe') !== FALSE)
    {
        // retrieve the video url
        $anchorRegex = '/src="(.*)?"/isU';
        $results = array();
        if (preg_match($anchorRegex, $video, $results))
        {
            $link = trim($results[1]);
        }
    }
    else
    {
        // we already have a url
        $link = $videoString;
    }
    if (strpos($link, 'youtube.com') !== FALSE) {
        preg_match(
            '/[\\?\\&]v=([^\\?\\&]+)/',
            $link,
            $matches
        );
        //the ID of the YouTube URL: x6qe_kVaBpg
        $id = $matches[1];
        return '//www.youtube.com/embed/'.$id;
    }
    else if (strpos($link, 'youtu.be') !== FALSE) {
        preg_match(
            '/youtu.be\/([a-zA-Z0-9_]+)\??/i',
            $link,
            $matches
        );
        $id = $matches[1];
        return '//www.youtube.com/embed/'.$id;
    }
    else if (strpos($link, 'player.vimeo.com') !== FALSE) {
        // works on:
        // http://player.vimeo.com/video/37985580?title=0&byline=0&portrait=0
        $videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
        preg_match($videoIdRegex, $link, $matches);
        $id = $matches[1];
        return '//player.vimeo.com/video/'.$id;
    }
    else if (strpos($link, 'vimeo.com') !== FALSE) {
        //extract the ID
        preg_match(
            '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',
            $link,
            $matches
        );
        //the ID of the Vimeo URL: 71673549
        $id = $matches[2];
        return '//player.vimeo.com/video/'.$id;
    }
    return $videoString;
    // return data
}





