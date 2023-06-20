<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index($albumName)
    {
        return view('album.index');
    }
}
