<?php

namespace App\Http\Controllers;
use IDAnalyzer\CoreAPI;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mtownsend\RemoveBg\RemoveBg;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class Card extends Controller
{
    public function Card(){
//

       $random =  Str::random(10);
       $file = request()->file('file');
       $removebg = new RemoveBg('JARuDBDfnaWsA1oQuhUGQhbJ');
       $image = $removebg->file($file);
       $core = new CoreAPI('kIkT6nxynxkG70NJX8VNDsBlx4Aihb76','US');
       $core->enableAuthentication('true','quick');
       $store = Image::make($file)->save("images/$random.png");
       $scan = $core->scan("images/$random.png");
       $result = $scan['result'];
//
       Session::put('Done',true);
       return view('result',[
//
        'data' => $result,
        'value1' => base64_encode($image->get())
//
       ]);
//
    }
}
