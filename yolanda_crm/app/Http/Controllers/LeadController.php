<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('user')->latest()->get();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        $statuses = ['Baru', 'Dihubungi', 'Kualifikasi', 'Tertarik', 'Gagal'];
        $sources = ['Website', 'Telepon', 'Pameran', 'Referensi'];
        
        return view('leads.create', compact('statuses', 'sources'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string',
            'source' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Tambahkan data baru
        Lead::create($request->all() + ['user_id' => Auth::id()]);

        return redirect()->route('leads.index')
                         ->with('success', 'Lead baru berhasil ditambahkan.');
    }

    public function edit(Lead $lead)
    {
        // Data untuk dropdown
        $statuses = ['Baru', 'Dihubungi', 'Kualifikasi', 'Tertarik', 'Gagal'];
        $sources = ['Website', 'Telepon', 'Pameran', 'Referensi'];

        return view('leads.edit', compact('lead', 'statuses', 'sources'));
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string',
            'source' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $lead->update($request->all());

        return redirect()->route('leads.index')
                         ->with('success', 'Lead berhasil diperbarui.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')
                         ->with('success', 'Lead berhasil dihapus.');
    }
}
