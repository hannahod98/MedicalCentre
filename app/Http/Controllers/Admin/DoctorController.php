<?php
# @Date:   2019-11-16T11:09:55+00:00
# @Last modified time: 2019-12-10T13:22:17+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;

class DoctorController extends Controller
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
        $doctors = Doctor::all();

        return view('admin.doctors.index')->with(['doctors'=> $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
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
          'start_date'=>'required|date'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt('secret');
        $user->save();

        $doctor = new Doctor();
        $doctor->start_date = $request->input('start_date');
        $doctor->user_id = $user->id;
        $doctor->save();

return redirect()->route('admin.doctors.index');

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

        return view('admin.doctors.show')->with([
          'doctor' => $doctor
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
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.edit')->with([
        'doctor' => $doctor
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
      $doctor = Doctor::findOrFail($id);

      $request->validate([
        'name'=>'required|max:191',
        'address'=>'required|max:100',
        'phone'=>'required|max:20|',
        'email'=>'required|max:191|unique:users,email,' . $doctor->user->id,
        'start_date'=>'required|date'
      ]);

      $user->user->name = $request->input('name');
      $user->user->address = $request->input('address');
      $user->user->phone = $request->input('phone');
      $user->user->email = $request->input('email');
      $user->user->password = bcrypt('secret');
      $user->user->save();

      $doctor->start_date = $request->input('start_date');
      $doctor->user_id = $doctor->user->id;
      $doctor->save();

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::findOrFail($id);

$doctor->delete();
      return redirect()->route('admin.doctors.index');
    }
}
