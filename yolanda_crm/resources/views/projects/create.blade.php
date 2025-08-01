@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg max-w-3xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Buat Proyek Baru</h1>
        <p class="text-gray-500 mt-1">Untuk Lead: <span class="font-semibold text-primary-dark">{{ $lead->name }}</span></p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
            <p class="font-bold">Oops! Ada beberapa kesalahan:</p>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="lead_id" value="{{ $lead->id }}">

        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Judul Proyek</label>
            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('title', 'Proyek untuk ' . $lead->name) }}" required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Pilih Produk/Layanan</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 border rounded-lg max-h-60 overflow-y-auto">
                @foreach($products as $product)
                <label class="flex items-center space-x-3 p-2 rounded-lg hover:bg-light cursor-pointer">
                    <input type="checkbox" name="products[]" value="{{ $product->id }}" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                    <span class="text-sm font-medium text-gray-800">{{ $product->name }}</span>
                    <span class="text-sm text-gray-500 ml-auto">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status Awal</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="notes" class="block mb-2 text-sm font-medium text-gray-700">Catatan</label>
            <textarea id="notes" name="notes" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">{{ old('notes') }}</textarea>
        </div>

        <div class="flex justify-end pt-4">
            <a href="{{ route('leads.index') }}" class="px-6 py-2.5 mr-3 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 bg-primary-dark text-white font-semibold text-sm rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark transition">Simpan Proyek</button>
        </div>
    </form>
</div>
@endsection
