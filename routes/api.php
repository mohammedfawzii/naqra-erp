<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\PageEnumService;


Route::get('test',function(Request $request){


        $page = $request->query('screen');

        return response()->json([
            'data' => PageEnumService::getEnums($page)
        ]);});
