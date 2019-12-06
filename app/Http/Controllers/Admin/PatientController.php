<?php
# @Date:   2019-12-05T14:25:46+00:00
# @Last modified time: 2019-12-05T16:27:30+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;

class PatientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = Patient::all();

      return view('admin.patients.index')->with(['patients'=> $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.patients.create');
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
        'name'=>'required|max:191',
        'address'=>'required|max:100',
        'phone'=>'required|max:20|',
        'email'=>'required|max:191',
        'insurance'=>'required|boolean',
        'insurance_name'=>'required|max:100'
      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = bcrypt('secret');
      $user->save();

      $patient = new Patient();
      $patient->insurance = $request->input('insurance');
      $patient->insurance_name = $request->input('insurance_name');
      $patient->user_id = $user->id;
      $patient->save();

return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);

      return view('admin.patients.show')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);

      return view('admin.patients.edit')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);

      $request->validate([
        'name'=>'required|max:191',
        'address'=>'required|max:100',
        'phone'=>'required|max:20|',
        'email'=>'required|max:191|unique:users,email,' . $patient->user->id,
        'insurance'=>'required|boolean',
        'insurance_name'=>'required|max:100'
      ]);

      $patient->user->name = $request->input('name');
      $patient->user->address = $request->input('address');
      $patient->user->phone = $request->input('phone');
      $patient->user->email = $request->input('email');
      $patient->user->password = bcrypt('secret');
      $patient->user->save();

      $patient->insurance = $request->input('insurance');
      $patient->insurance_name = $request->input('insurance_name');
      $patient->user_id = $patient->user->id;
      $patient->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);

      $patient->delete();
      return redirect()->route('admin.patients.index');
    }
}
