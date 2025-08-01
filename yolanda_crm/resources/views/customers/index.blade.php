@extends('layouts.app')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Customers</h1>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">Name</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Email</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Phone</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                <tr class="bg-white border-b hover:bg-light">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $customer->name }}</td>
                    <td class="px-6 py-4">{{ $customer->email }}</td>
                    <td class="px-6 py-4">{{ $customer->phone }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-secondary hover:text-violet-600 p-2 rounded-md hover:bg-violet-100 transition">View</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">
                            Tidak ada data customers.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
