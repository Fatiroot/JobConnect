<?php

namespace App\Http\Controllers\Condidater;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;

class ExperienceController extends Controller
{
    // public function index()
    // {
    //     $experiences = Experience::all();
    //     return view('Condidater.index', compact('experiences'));
    // }

    public function create()
    {
        return view('Condidater.experiences.create');
    }


    public function store(ExperienceStoreRequest $request)
    {
        $experiences= Experience::create($request->all());
        $experiences['user_id'] = auth()->id();
        return redirect()->route('formations.index')->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
//
    }


    public function edit(Experience $experience)
    {
        return view('Condidater.experiences.edit', compact('experience'));
    }

    public function update(ExperienceUpdateRequest $request, Experience $experience)
    {
        $experience->update($request->validated());
        return redirect()->route('Condidater.experiences.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('formations.index')->with('success', 'Experience deleted successfully.');
    }
}
