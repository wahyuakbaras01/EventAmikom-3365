@extends('admin.layouts.app')

@section('page-title', 'Manajemen Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h2 class="card-title">🏷️ Daftar Kategori</h2>
            <p style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">Kelola semua kategori event</p>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem;flex-wrap:wrap;">
            {{-- Soal 3: Search Form --}}
            <form method="GET" action="{{ route('admin.categories.index') }}" class="search-form" id="search-form-categories">
                <input
                    id="search-input-categories"
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="🔍 Cari nama kategori..."
                    value="{{ $search ?? '' }}"
                >
                <button type="submit" class="btn btn-primary">Cari</button>
                @if($search)
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Reset</a>
                @endif
            </form>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success" id="btn-add-category">
                ➕ Tambah Kategori
            </a>
        </div>
    </div>

    @if($search)
        <p style="font-size:0.8rem;color:var(--text-muted);margin-bottom:1rem;">
            Hasil pencarian untuk: <strong style="color:var(--primary);">"{{ $search }}"</strong>
            — ditemukan {{ $categories->count() }} data
        </p>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">ID</th>
                    <th>Nama Kategori</th>
                    <th>Dibuat Pada</th>
                    <th>Diperbarui Pada</th>
                    <th style="width:160px;text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>
                        <span class="badge badge-primary">#{{ $category->id }}</span>
                    </td>
                    <td>
                        <strong>{{ $category->name }}</strong>
                    </td>
                    <td style="color:var(--text-muted);font-size:0.8rem;">
                        {{ $category->created_at->format('d M Y, H:i') }}
                    </td>
                    <td style="color:var(--text-muted);font-size:0.8rem;">
                        {{ $category->updated_at->format('d M Y, H:i') }}
                    </td>
                    <td style="text-align:center;">
                        <div style="display:flex;gap:0.4rem;justify-content:center;">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                               class="btn btn-warning btn-sm"
                               id="btn-edit-category-{{ $category->id }}">
                                ✏️ Edit
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.categories.destroy', $category) }}"
                                  id="form-delete-category-{{ $category->id }}"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <div class="icon">🏷️</div>
                            <p>Belum ada kategori{{ $search ? ' yang ditemukan' : '' }}.</p>
                            @if(!$search)
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="margin-top:0.75rem;">
                                    ➕ Tambah Kategori Pertama
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
