<?php

namespace App\Http\Controllers\Admin;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class DomainController extends Controller
{
    public function index()
{
    $cities = City::all();
    $domain = Domain::all();
    return view('admin.AjouteCaractaire', compact('cities', 'domain')); // Include both variables
}



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);
        Domain::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('domain.index')->with('success', 'DOMAIN ajoutée avec succès.');    
    }



    public function destroy($id)
    {
        $domains = Domain::findOrFail($id);
        $domains->delete();

    return redirect()->route('domain.index')->with('success', 'Domain supprimée avec succès.');
    }
}
