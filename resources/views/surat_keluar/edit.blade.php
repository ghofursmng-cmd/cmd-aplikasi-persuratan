@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white/70 p-8 rounded-2xl glass">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Edit Surat Keluar</h2>
            <p class="text-gray-500 text-sm">Perbarui informasi surat keluar di bawah ini.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan input:</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ $suratKeluar->nomor_surat }}" required class="w-full bg-white/50 border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" value="{{ $suratKeluar->tanggal_surat }}" required class="w-full bg-white/50 border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan Surat</label>
                <input type="text" name="tujuan_surat" value="{{ $suratKeluar->tujuan_surat }}" required class="w-full bg-white/50 border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Perihal Isi Surat</label>
                <textarea name="perihal" rows="4" required class="w-full bg-white/50 border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">{{ $suratKeluar->perihal }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
                <a href="{{ route('surat-keluar.index') }}" class="text-gray-500 hover:text-gray-700 font-medium px-4">Batal</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-2.5 rounded-xl font-medium transition-all shadow-lg shadow-indigo-200">
                    Update Surat Keluar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
