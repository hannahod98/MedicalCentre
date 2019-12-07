<?php
# @Date:   2019-12-05T19:51:26+00:00
# @Last modified time: 2019-12-07T17:23:55+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visits = Visit::all();

      return view('admin.visits.index')->with(['visits'=> $visits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $patients = Patient::all();
      $doctors = Doctor::all();
      return view('admin.visits.create')->with([
          'doctors' => $doctors,
          'patients' => $patients
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'date'=>'required|date',
        'time'=>'required',
        'duration'=>'required|max:191',
        'patient_id'=>'required|max:20',
        'doctor_id'=>'required|max:20',
        'cost'=>'required'

      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->cost = $request->input('cost');
      $visit->save();



      return redirect()->route('admin.visits.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();
      return view('admin.visits.show')->with([
        'visit' => $visit,
        'doctors' => $doctors,
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();
      return view('admin.visits.edit')->with([
          'visit' => $visit,
          'doctors' => $doctors,
          'patients' => $patients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
      $request->validate([
        'date'=>'required|date',
        'time'=>'required',
        'duration'=>'required|max:191',
        'patient_id'=>'required|max:20',
        'doctor_id'=>'required|max:20',
        'cost'=>'required'

      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->cost = $request->input('cost');
      $visit->save();



      return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
