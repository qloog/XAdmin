<?php
/*
 * Global helpers file with misc functions
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function app_name() {
        return config('app.name');
    }
}

if ( ! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function
     */
    function access()
    {
        return app('access');
    }
}

if ( ! function_exists('human_filesize')) {
    /**
     * Return sizes readable by humans
     * @param int $bytes
     * @param int $decimals
     * @return string
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
        @$size[$factor];
    }
}

if ( ! function_exists('is_image')) {
    /**
     * Is the mime type an image
     * @param string $mimeType
     * @return bool
     */
    function is_image($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}

if ( ! function_exists('get_image_url')) {
    /**
     * get image path
     * @param string $imageName
     * @param bool   $fullUrl
     * @return string
     */
    function get_image_url($imageName, $fullUrl = false)
    {
        $image =  \Illuminate\Support\Facades\DB::table('images')->where('image_name', '=', $imageName)->first();
        $imagePath = $image ? $image->image_path : null;
        if ($fullUrl) {
            return $image ? get_static_domain() . $imagePath : get_static_domain() . config('custom.default_image');
        }
        return $image ? $imagePath : config('custom.default_image');
    }
}

if ( ! function_exists('get_static_domain')) {
    /**
     * get static domain
     * @return string
     */
    function get_static_domain()
    {
        return 'http://www.local.com/';
    }
}

if ( ! function_exists('get_relation_title')) {
    /**
     * get static domain
     * @param $type
     * @param $relation_id
     * @return string
     */
    function get_relation_title($type, $relation_id)
    {
        $title = '';
        switch($type){
            case 'news':
                $obj = DB::table('news')->select('title')->where('id', '=', $relation_id)->first();
                $title = $obj->title;
                break;
            case 'photo':
                $obj = DB::table('album_photo')->select('photo_name')->where('id', '=', $relation_id)->first();
                $title = $obj->album_photo;
                break;
            default:
                $title = '没有对应的分类';
                break;
        }
        return $title;
    }
}