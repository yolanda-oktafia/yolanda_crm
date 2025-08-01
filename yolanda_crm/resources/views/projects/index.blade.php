@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Projects</h1>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">Title</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Client</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Status</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="bg-white border-b hover:bg-light">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $project->title }}</td>
                    <td class="px-6 py-4">{{ $project->client }}</td>
                    <td class="px-6 py-4">
                        @if(strtolower($project->status) == 'approved')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Approved
                            </span>
                        @elseif(strtolower($project->status) == 'pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        @else
                             <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ ucfirst($project->status) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-secondary hover:text-violet-600 p-2 rounded-md hover:bg-violet-100 transition">View</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">
                            Tidak ada data projects.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
