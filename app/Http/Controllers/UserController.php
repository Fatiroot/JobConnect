<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    { 
        $users = User::with('roles')->get();
        return view('admin.users.index',compact('users'));
      
    }

    public function create()
    {
       //
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'phone' => $request->phone,

        ]);
        $user->roles()->attach([2]);
        $user->addMediaFromRequest('image')->toMediaCollection('images');
        return to_route('login');

    }

    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

   
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        if ($request->hasFile('image')) {
          $user->clearMediaCollection('images');
          $user->addMediaFromRequest('image')->toMediaCollection('images');
      }
        return redirect()->route('users.index');
   }
  

    
    public function destroy(User $user)
    {
       $user->delete();
       return redirect()->route('users.index');
    }


    public function allusers()
   {
    $users=User::all();
    $deletedusers = User::onlyTrashed()->get();
    return view('admin.dashboard',compact('users','deletedusers'));
   }

   public function restore($userId)
   {
       $user = User::withTrashed()->find($userId)->restore();

       return redirect()->route('dashboard');
   }
}
