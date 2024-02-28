<?php

namespace App\Http\Controllers\Ceo;

use App\Models\City;
use App\Models\Offre;
use App\Models\Domain;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOffreRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $offres = Offre::all();
        $user = Auth::user();

    // Récupérer les offres où l'ID de la société correspond à l'ID de la société de l'utilisateur
    $offres = Offre::where('company_id', $user->company_id)->get();

        return view('ceo.offres.index', compact('offres'));
    }


    public function index2()
    {
        // Récupérer toutes les offres
        $offres = Offre::all();
    
        return view('home', compact('offres'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $domains = Domain::all();
        $cities = City::all();

        return view('ceo.offres.create', compact('companies', 'domains', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffreRequest $request)
    {
    
        $offer= Offre::create($request->all());
        $offer->addMediaFromRequest('image')->toMediaCollection('images');
            return redirect()->route('offerceo.index');
    
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offre = Offre::with(['company', 'domain', 'city'])->findOrFail($id); 

        return view('DetailOfferUser', compact('offre'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre = Offre::find($id);
        $companies = Company::all(); 
        $domains = Domain::all(); 
        $cities = City::all();
        return view('ceo.offres.update', compact('offre', 'companies', 'domains', 'cities'));
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
        $offre = Offre::find($id);
        // Mise à jour de l'offre
        $offre->update($request->all());
        // Redirection
        return redirect()->route('offerceo.index')->with('success', 'Offre mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offre = Offre::find($id);
        $offre->delete();
        return redirect()->route('offerceo.index')->with('success', 'Offre supprimée avec succès');
    }
}