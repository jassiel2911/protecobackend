<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('role','0');
        $i=1;
        return view('admin.users.index', compact('users','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
        $user=User::findOrFail($id);
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->password=Hash::make($request->password);


        $user->email=$request->email;
        $user->origin=$request->origin;
        $user->gender=$request->gender;
        $user->role=$request->role;


        $user->update();

        return redirect('admin')->with('success','El usuario se ha actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success','El usuario se ha eliminado');

    }

    public function becarios()
    {
        $becarios = User::all()->where('role','1');
        return view('admin.users.becarios', compact('becarios'));
    }

    public function admins()
    {
        $admins = User::all()->where('role','2');
        return view('admin.users.admins', compact('admins'));
    }

    public function unam()
    {
        $users = User::all()->where('origin','Comunidad UNAM');
        return view('admin.users.unam', compact('users'));
    }
    public function nounam()
    {
        $users = User::all()->where('origin','Alumno externo');
        return view('admin.users.nounam', compact('users'));
    }
    public function publicogeneral()
    {
        $users = User::all()->where('origin','Publico en general');
        return view('admin.users.publicogeneral', compact('users'));
    }
}
