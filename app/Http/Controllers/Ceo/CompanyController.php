<?php

namespace App\Http\Controllers\Ceo;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('ceo.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ceo.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request) {
        $company = Company::create($request->all());
        $company->addMediaFromRequest('image')->toMediaCollection('images');
        
        // Update the user's company ID
        $user = Auth::user();
        
        if ($user instanceof User) {
            $user->company_id = $company->id;
            $user->save();
        } else {
            return redirect()->back()->withInput()->with('error', 'Unable to save user information.');
        }
        
        return redirect()->route('ceo.offers.index')->with('success', 'Company created successfully.');
    }
    
    
    
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
         $company->delete();
        return back();
    }
}