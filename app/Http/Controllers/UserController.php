<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

      if ($request->ajax())
        {
          $user = User::findOrFail($id);
          $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
          ]);

          $user->name = $request->get('name');
          $user->email = $request->get('email');
          $user->rights = $request->get('role');
          $user->save();

          return $request->json(200, ["text" => "Uporabnik je bil posodbljen"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->ajax()){
        $user = User::findOrFail($id);
        $user->delete();
        return $request->json(200, ["text" => "Uporabnik je bil izbrisan"]);
      }
    }

    public function filterUsers(Request $request)
    {
      if ($request->ajax())
      {
          return User::search($request->input('param'), null, true)->get();
      }
    }
}