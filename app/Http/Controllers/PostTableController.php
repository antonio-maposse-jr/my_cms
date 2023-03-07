<?php

namespace App\Http\Controllers;

class PostTableController extends Controller
{
    public function tableData()
    {
        return view('post.table');
    }
}
