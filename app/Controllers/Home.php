<?php

namespace App\Controllers;

use App\Models\AnimeModel;

class Home extends BaseController
{    
    public function index(){
      return view('home');
    }
}
