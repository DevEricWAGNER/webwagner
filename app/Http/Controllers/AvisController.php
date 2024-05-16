<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Avis::class);
        $avis = Avis::all();
        return view('avis.index', [
            'avis' => $avis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Avis::class);
        return view('avis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Avis::class);


    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avis $avis)
    {
        $this->authorize('update', $avis);
        return view('avis.edit', [
            'avis' => $avis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avis $avis)
    {
        $this->authorize('update', $avis);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        $this->authorize('delete', $avis);
        $avis->delete();
        return redirect()->route('avis.index');
    }
}
