<?php
# @Date:   2019-11-06T14:49:20+00:00
# @Last modified time: 2019-11-12T13:55:31+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $user = $request->user();
      $home = 'patient.home';

      if($user->hasAnyRole('admin')){
        $home = 'admin.home';
      }
      elseif ($user->hasAnyRole('doctor')) {
        $home = 'doctor.home';
      }
      else{
        $home = 'patient.home';
      }

        return redirect()->route($home);
    }
}
