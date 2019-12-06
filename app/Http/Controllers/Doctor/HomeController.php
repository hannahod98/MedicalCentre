<?php
# @Date:   2019-11-07T19:28:55+00:00
# @Last modified time: 2019-11-16T10:30:31+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
  public function __construct()
  {

      $this->middleware('auth');
      $this->middleware('role:doctor');

  }
    public function index(){
      $user = Auth::user();
    return view('doctor.home')->with(['doctor'=>$user]);
}
}
