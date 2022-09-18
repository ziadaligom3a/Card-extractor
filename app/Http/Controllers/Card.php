<?php

namespace App\Http\Controllers;

require_once '../../../vendor/autoload.php';

use IDAnalyzer\CoreAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Card extends Controller
{
    public function Card(){
    

       $file = request()->file('file');
       $core = new CoreAPI('dY8svl2WVBqRxbuidJaBeYOZ6gvgE7Tb','US');
       $core->enableAuthentication('true','quick');
       $scan = $core->scan($file);
       $result = $scan['result'];

       Session::put('Done',true);
       return view('result',[

        'data' => $result

       ]);

    }
}
