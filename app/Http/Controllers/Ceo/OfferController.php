<?php

namespace App\Http\Controllers\Ceo;

use App\Http\Requests\StoreOffreRequest;
use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Domain;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::all();

        return view('admin.offres', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createOffer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffreRequest $request)
    {
        try{

            Offre::create($request->all());
            return redirect()->route('offer.index');
    
            }catch(\Exception $e){
    
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('admin.EditeOffer', compact('offre', 'companies', 'domains', 'cities'));
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
        return redirect()->route('offer.index')->with('success', 'Offre mise à jour avec succès');
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
        return redirect()->route('offer.index')->with('success', 'Offre supprimée avec succès');
    }
}
