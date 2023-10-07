<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('role', 'city')->get();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = ModelsRole::all();
        $city = City::all();

        return view('user.create-form', compact('role', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', Password::min(8)->letters()->numbers()],
            'role_id' => 'required',
            'city_id' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        $create = User::create($data);

        if ($data['role_id'] == '1') {
            $create->assignRole('admin');
        } else {
            $create->assignRole('user');
        }

        toast('Berhasil menambahkan user!', 'success');

        return redirect()->route('user.index');
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
        $user = User::with('role', 'city')->findOrFail($id);
        $role = ModelsRole::all();
        $city = City::all();

        return view('user.update-form', compact('user', 'role', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserUpdateRequest $request, $id)
    {

        $data = User::findOrFail($id);

        $request->validated();

        $request['password'] = bcrypt($request['password']);

        $data->update([
            'username' => $request->username,
            'email'  => $request->email,
            'password'  => $request->password,
            'role_id' => $request->role_id,
            'city_id' => $request->city_id
        ]);


        if ($data['role_id'] == '1') {
            $data->syncRoles('admin');
        } else {
            $data->syncRoles('user');
        }

        toast('Berhasil mengedit user!', 'success');

        if ($data['role_id'] == '1') {
            return redirect()->route('user.index');
        } else {
            if (auth()->user()->id == $id) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('user.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->route('user.index');
    }
}
