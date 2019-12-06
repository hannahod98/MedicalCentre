<?php
# @Date:   2019-12-01T16:59:20+00:00
# @Last modified time: 2019-12-01T17:08:27+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $doctors = Doctor::all();

      return view('patient.doctors.index')->with(['doctors'=> $doctors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Doctor::findOrFail($id);

      return view('patient.doctors.show')->with([
        'doctor' => $doctor
      ]);
    }


}
