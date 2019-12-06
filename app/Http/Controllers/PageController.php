<?php
# @Date:   2019-11-16T10:46:22+00:00
# @Last modified time: 2019-11-16T10:55:56+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function welcome(){
    return view('welcome');

  }

  public function about(){
    return view('about');

  }
}
