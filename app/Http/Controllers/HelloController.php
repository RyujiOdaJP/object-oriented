<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MyJob;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index ()
    {
        MyJob::dispatch();
        $data = [
            'msg' => 'show people recode',
        ];

        return view('hello.index', compact('data'));
    }
}
