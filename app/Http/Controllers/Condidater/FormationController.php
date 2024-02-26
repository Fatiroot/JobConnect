<?php

namespace App\Http\Controllers\Condidater;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;

class FormationController extends Controller
{
    
    public function index()
    {
        $formations = Formation::all();
        return view('Condidater.profile', compact('formations'));
    }


    public function create()
    {
        return view('Condidater.formations.create');
    }


    public function store(FormationStoreRequest $request)
    {
        $formations= Formation::create($request->all());
        $formations['user_id'] = auth()->id();
        return redirect()->route('profile.index')->with('success', 'Formation created successfully.');
    }

    public function show(Formation $formation)
    {
//
    }

    public function edit(Formation $formation)
    {
        return view('Condidater.formations.edit', compact('formation'));
    }

    public function update(FormationUpdateRequest $request, Formation $formation)
    {
        $formation->update($request->validated());
        return redirect()->route('Condidater.formations.index')->with('success', 'Formation updated successfully.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('Condidater.formations.index')->with('success', 'Formation deleted successfully.');
    }
}
