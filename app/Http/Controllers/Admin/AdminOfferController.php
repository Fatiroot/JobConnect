<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offre;

class AdminOfferController extends Controller
{
    public function index(Offre $offers){
        $offres=Offre::all();
      
        return view('admin.offres',compact('offres'));
    }
}
