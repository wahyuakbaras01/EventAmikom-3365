@extends('admin.layouts.app')

@section('page-title', 'Edit Kategori')

@section('content')
<div class="card" style="max-width:560px;">
    <div class="card-header">
        <div>
            <h2 class="card-title">✏️ Edit Kategori</h2>
            <p style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">Ubah nama kategori #{{ $category->id }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.categories.update', $category) }}" id="form-edit-category-{{ $category->id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Nama Kategori</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Nama kategori..."
                value="{{ old('name', $category->name) }}"
                required
                autofocus
            >
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div style="font-size:0.75rem;color:var(--text-muted);margin-bottom:1rem;">
            Dibuat: {{ $category->created_at->format('d M Y, H:i') }} &nbsp;|&nbsp;
            Diperbarui: {{ $category->updated_at->format('d M Y, H:i') }}
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning" id="btn-update-category">
                💾 Perbarui Kategori
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>
    </form>
</div>
@endsection
