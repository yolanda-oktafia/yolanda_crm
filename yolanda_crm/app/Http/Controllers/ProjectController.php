<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['lead', 'user'])->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create(Request $request)
    {
        $lead = Lead::findOrFail($request->query('lead_id'));
        $products = Product::where('status', 'Aktif')->get();
        
        $statuses = ['Menunggu Approval', 'Disetujui', 'Ditolak', 'Dalam Pengerjaan', 'Selesai'];

        return view('projects.create', compact('lead', 'products', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'lead_id' => 'required|exists:leads,id',
            'status' => 'required|string',
            'products' => 'required|array|min:1',
            'products.*' => 'exists:products,id',
            'notes' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $project = Project::create([
                'title' => $request->title,
                'lead_id' => $request->lead_id,
                'user_id' => Auth::id(),
                'status' => $request->status,
                'notes' => $request->notes,
            ]);

            $totalValue = 0;
            foreach ($request->products as $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $project->products()->attach($productId, [
                        'quantity' => 1, 
                        'price' => $product->price,
                    ]);
                    $totalValue += $product->price;
                }
            }

            $project->value = $totalValue;
            $project->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat proyek: ' . $e->getMessage())->withInput();
        }

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat.');
    }
    
}
