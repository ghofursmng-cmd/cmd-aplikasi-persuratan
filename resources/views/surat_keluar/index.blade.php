@extends('layouts.app')

@section('content')
<div class="bg-white/70 p-6 rounded-2xl glass">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Surat Keluar</h2>
        <a href="{{ route('surat-keluar.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Surat Keluar
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-400 text-sm border-b border-gray-100">
                    <th class="py-4 px-2 font-medium">Nomor Surat</th>
                    <th class="py-4 px-2 font-medium">Tanggal Surat</th>
                    <th class="py-4 px-2 font-medium">Tujuan</th>
                    <th class="py-4 px-2 font-medium">Perihal</th>
                    <th class="py-4 px-2 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($suratKeluars as $surat)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="py-4 px-2 text-gray-700 font-medium">{{ $surat->nomor_surat }}</td>
                        <td class="py-4 px-2 text-gray-700">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                        <td class="py-4 px-2 text-gray-700">{{ $surat->tujuan_surat }}</td>
                        <td class="py-4 px-2 text-gray-600 leading-relaxed">{{ Str::limit($surat->perihal, 50) }}</td>
                        <td class="py-4 px-2 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.707.707-2.828-2.828.707-.707zM11.365 5.828l-8.591 8.591a1 1 0 00-.272.508l-1 4a1 1 0 001.213 1.213l4-1a1 1 0 00.508-.272l8.591-8.591-2.828-2.828z" />
                                    </svg>
                                </a>
                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-400">Belum ada data surat keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-6">
        {{ $suratKeluars->links() }}
    </div>
</div>
@endsection
