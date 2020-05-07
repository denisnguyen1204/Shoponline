<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use http\Env\Request;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("admin.master");
    }
}

