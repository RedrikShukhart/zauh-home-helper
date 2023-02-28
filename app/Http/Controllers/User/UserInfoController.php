<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        return 'страница просмотра данных о пользователе';
    }
}
