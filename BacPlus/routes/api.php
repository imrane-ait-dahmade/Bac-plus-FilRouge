<?php

use illuminate\http\Request;
use Illuminate\Support\Facades\Route;


Route:get('/', function (){
    return response('Hello World');
});
