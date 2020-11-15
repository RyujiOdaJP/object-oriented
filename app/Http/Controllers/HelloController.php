<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MyJob;
use Illuminate\Http\Request;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    public function index (MyService $my_service, int $id = -1)
    {
        MyJob::dispatch();

//        $my_service = app()->makeWith(MyService::class, ['id' => $id]);
        $my_service->setId($id);
        $data = [
            'msg' => 'show people recode',
            'myServiceMsg' => $my_service->say(),
            'myServiceData' => $my_service->allData()
        ];

        return view('hello.index', compact('data'));
    }
}
