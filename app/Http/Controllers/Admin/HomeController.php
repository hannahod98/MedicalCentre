<?php
# @Date:   2019-11-07T19:29:05+00:00
# @Last modified time: 2019-11-07T21:25:02+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    public function index(){
      return view('admin.home');
    }
}
