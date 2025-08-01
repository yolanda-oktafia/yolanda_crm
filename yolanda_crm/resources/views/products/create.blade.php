@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Produk Baru</h1>
        <p class="text-gray-500 mt-1">Isi detail di bawah untuk membuat layanan baru.</p>
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

    <form method="POST" action="{{ route('products.store') }}" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama Produk/Layanan</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('name') }}" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Harga (Rp)</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('price') }}" required>
            </div>
        </div>
        
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status Produk</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end pt-4">
            <a href="{{ route('products.index') }}" class="px-6 py-2.5 mr-3 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 bg-primary-dark text-white font-semibold text-sm rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark transition">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection
