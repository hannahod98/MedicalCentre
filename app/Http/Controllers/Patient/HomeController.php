<?php
# @Date:   2019-11-07T19:28:43+00:00
# @Last modified time: 2019-11-07T21:11:03+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');

  }
    public function index(){
    return view('patient.home');
}
}
