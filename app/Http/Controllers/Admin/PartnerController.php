<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $partners = Partner::when($search, function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'logo_url' => 'nullable|url|max:500',
        ]);

        Partner::create($request->only('name', 'logo_url'));

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'logo_url' => 'nullable|url|max:500',
        ]);

        $partner->update($request->only('name', 'logo_url'));

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus!');
    }
}
