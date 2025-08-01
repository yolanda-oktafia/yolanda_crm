@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Leads</h1>
        <a href="{{ route('leads.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-dark text-white font-semibold text-sm rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark transition">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Tambah Lead
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">Nama</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Status</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Sumber</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Sales</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr class="bg-white border-b hover:bg-light">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <div class="flex flex-col">
                                <span class="font-bold">{{ $lead->name }}</span>
                                <span class="text-xs text-gray-500">{{ $lead->email }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColor = match($lead->status) {
                                    'Baru' => 'bg-blue-100 text-blue-800',
                                    'Dihubungi' => 'bg-cyan-100 text-cyan-800',
                                    'Kualifikasi' => 'bg-indigo-100 text-indigo-800',
                                    'Tertarik' => 'bg-green-100 text-green-800',
                                    'Gagal' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                            @endphp
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                {{ $lead->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $lead->source }}</td>
                        <td class="px-6 py-4">{{ $lead->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{-- route('projects.create', ['lead_id' => $lead->id]) --}}" class="font-medium text-white bg-secondary hover:bg-violet-500 px-3 py-1.5 rounded-md text-xs transition shadow-sm">
                                    Buat Proyek
                                </a>
                                <a href="{{ route('leads.edit', $lead) }}" class="font-medium text-yellow-500 hover:text-yellow-600 p-2 rounded-md hover:bg-yellow-100 transition">Edit</a>
                                <form action="{{ route('leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lead ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500 hover:text-red-600 p-2 rounded-md hover:bg-red-100 transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500">
                            Tidak ada data leads.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
