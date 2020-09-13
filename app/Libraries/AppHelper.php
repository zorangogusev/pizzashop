<?php
namespace App\Libraries;

use Image;

class AppHelper
{
    public static function instance()
    {
        return new AppHelper();
    }

    /**
     * get the image from public images directory
     */
    public function getImage($request)
    {
        $routeToImage = base_path() . $request->get('path') . $request->get('image');
        $mime_type = mime_content_type($routeToImage);
        header('Content-Type: ' . $mime_type);
        readfile($routeToImage);
    }
}
