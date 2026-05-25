@extends('admin.layouts.app')

@section('page-title', 'Tambah Kategori')

@section('content')
<div class="card" style="max-width:560px;">
    <div class="card-header">
        <div>
            <h2 class="card-title">➕ Tambah Kategori Baru</h2>
            <p style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">Isi form di bawah ini</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.categories.store') }}" id="form-create-category">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Nama Kategori</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Contoh: Teknologi, Seni, Bisnis..."
                value="{{ old('name') }}"
                required
                autofocus
            >
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success" id="btn-submit-category">
                💾 Simpan Kategori
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>
    </form>
</div>
@endsection
