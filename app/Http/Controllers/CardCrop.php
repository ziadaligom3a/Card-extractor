<?php

namespace App\Http\Controllers;

use IDAnalyzer\CoreAPI;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Imagecow\Image as ImageCow;
use Mtownsend\RemoveBg\RemoveBg;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CardCrop extends Controller
{
    public function CROP(){

        $file = request()->file('file');
        $random =  Str::random(10);
        $removebg = new RemoveBg('JARuDBDfnaWsA1oQuhUGQhbJ');
        $image = $removebg->file($file)->get();
        $imagecow = ImageCow::fromString($image);
        $crop = $imagecow->crop(500, 270)->quality(100);
        $done = $crop->save("images/$random.png");
        $core = new CoreAPI('kIkT6nxynxkG70NJX8VNDsBlx4Aihb76','US');
        $core->enableAuthentication('true','quick');
        $scan = $core->scan("images/$random.png");
        $result = $scan['result'];
        Session::put('Done',true);
        return view('result',[

         'data' => $result,
         'value1' => $crop->base64()
        ]);
    }
}
