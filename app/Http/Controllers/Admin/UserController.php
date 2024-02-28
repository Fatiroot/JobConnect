<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return view('ceo.recruiter.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'phone' => $request->phone,

        ]);
        $user->roles()->attach([4]);
        $user->addMediaFromRequest('image')->toMediaCollection('images');
        return to_route('comany.index');

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

   
   public function createrecruiter()
   {
       return view('ceo.recruiter.create');
   }

   public function storerecruiter(UserRequest $request)
   {
       // Récupérer l'utilisateur authentifié
       $authUser = Auth::user();
   
       // Créer un nouvel utilisateur avec les données fournies dans la requête
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->phone = $request->phone;
       $user->company_id = $authUser->company_id; // Associer l'ID de la société de l'utilisateur authentifié
       $user->save();
   
       // Assigner le rôle de recruteur à l'utilisateur
       $user->roles()->attach(4);
       $user->addMediaFromRequest('image')->toMediaCollection('images');

       // Rediriger vers la route appropriée (corrigé to_route en route)
       return redirect()->route('company.index');
   }
    
   public function destroyrecruiter(User $user)
   {
    dd('Inside destroyrecruiter method', $user);
      $user->delete();
       return view('ceo.recruiter.index');
   }

}
