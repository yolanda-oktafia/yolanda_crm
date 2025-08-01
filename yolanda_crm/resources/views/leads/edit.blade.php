@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Lead</h1>
        <p class="text-gray-500 mt-1">Perbarui detail untuk lead: {{ $lead->name }}</p>
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

    <form method="POST" action="{{ route('leads.update', $lead->id) }}" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('name', $lead->name) }}" required>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('phone', $lead->phone) }}">
            </div>
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Alamat Email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('email', $lead->email) }}">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" {{ old('status', $lead->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="source" class="block mb-2 text-sm font-medium text-gray-700">Sumber Lead</label>
                <select id="source" name="source" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    @foreach($sources as $source)
                        <option value="{{ $source }}" {{ old('source', $lead->source) == $source ? 'selected' : '' }}>{{ $source }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="notes" class="block mb-2 text-sm font-medium text-gray-700">Catatan</label>
            <textarea id="notes" name="notes" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">{{ old('notes', $lead->notes) }}</textarea>
        </div>
        <div class="flex justify-end pt-4">
            <a href="{{ route('leads.index') }}" class="px-6 py-2.5 mr-3 text-sm font-semibold text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 bg-primary-dark text-white font-semibold text-sm rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark transition">Update Lead</button>
        </div>
    </form>
</div>
@endsection
