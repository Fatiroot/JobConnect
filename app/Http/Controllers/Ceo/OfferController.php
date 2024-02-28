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
use Illuminate\Support\Facades\DB;

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

    
    
    public function ajoute(Request $request, $id)
    {
        try {
            $offre = Offre::findOrFail($id);
            $user = auth()->user(); // Récupérer l'utilisateur authentifié
    
            // Enregistrer la demande de participation dans la base de données
            $offre->pendingCandidates()->attach($user->id, [
                'application_date' => now(),
                'description' => $request->input('description', ''), // Utiliser une chaîne vide si 'description' n'est pas fourni
                'status' => 1, // Assumant que 1 signifie "en attente"
                'user_id' => $user->id,
                'offre_id' => $id
            ]);
    
            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Votre demande de participation a été soumise avec succès et est en attente d\'approbation.');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la soumission de votre demande de participation. Message d\'erreur : ' . $e->getMessage());
        }
    }

    
    public function showApplications()
    {
        $applications = DB::table('offre_users')
                            ->join('users', 'offre_users.user_id', '=', 'users.id')
                            ->join('offres', 'offre_users.offre_id', '=', 'offres.id')
                            ->select('offre_users.*', 'users.name as userName', 'offres.title as offreTitle')
                            ->get();
    
        return view('AjouteOffer', compact('applications'));
    }

    public function acceptApplication(Request $request, $id)
{
    $application = DB::table('offre_users')->where('id', $id)->update(['status' => 2]); // 2 pour "Accepté"
    return back()->with('success', 'Candidature acceptée.');
}

public function rejectApplication(Request $request, $id)
{
    $application = DB::table('offre_users')->where('id', $id)->update(['status' => 3]); // 3 pour "Refusé"
    return back()->with('error', 'Candidature refusée.');
}

public function search(Request $request)
    {
        $keyword = $request->query('keyword');
        $domains = Domain::all();

        $offres = Offre::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhereHas('domain', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->get();
        return view('/home', compact('offres', 'keyword' , 'domains'));
    }

    

    



    
}