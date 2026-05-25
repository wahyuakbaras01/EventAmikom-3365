@extends('admin.layouts.app')

@section('page-title', 'Manajemen Partner')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h2 class="card-title">🤝 Daftar Partner</h2>
            <p style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">Kelola semua partner AmikomEventHub</p>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem;flex-wrap:wrap;">
            {{-- Soal 3: Search Form --}}
            <form method="GET" action="{{ route('admin.partners.index') }}" class="search-form" id="search-form-partners">
                <input
                    id="search-input-partners"
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="🔍 Cari nama partner..."
                    value="{{ $search ?? '' }}"
                >
                <button type="submit" class="btn btn-primary">Cari</button>
                @if($search)
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Reset</a>
                @endif
            </form>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-success" id="btn-add-partner">
                ➕ Tambah Partner
            </a>
        </div>
    </div>

    @if($search)
        <p style="font-size:0.8rem;color:var(--text-muted);margin-bottom:1rem;">
            Hasil pencarian untuk: <strong style="color:var(--primary);">"{{ $search }}"</strong>
            — ditemukan {{ $partners->count() }} data
        </p>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">ID</th>
                    <th>Nama Partner</th>
                    <th>Logo</th>
                    <th>Dibuat Pada</th>
                    <th>Diperbarui Pada</th>
                    <th style="width:160px;text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr>
                    <td>
                        <span class="badge badge-primary">#{{ $partner->id }}</span>
                    </td>
                    <td>
                        <strong>{{ $partner->name }}</strong>
                    </td>
                    <td>
                        @if($partner->logo_url)
                            <img src="{{ $partner->logo_url }}"
                                 alt="{{ $partner->name }}"
                                 style="height:36px;object-fit:contain;border-radius:4px;background:#fff;padding:2px 4px;"
                                 onerror="this.outerHTML='<span style=\'color:var(--text-muted);font-size:0.75rem;\'>URL tidak valid</span>'"
                            >
                        @else
                            <span style="color:var(--text-muted);font-size:0.8rem;">—</span>
                        @endif
                    </td>
                    <td style="color:var(--text-muted);font-size:0.8rem;">
                        {{ $partner->created_at->format('d M Y, H:i') }}
                    </td>
                    <td style="color:var(--text-muted);font-size:0.8rem;">
                        {{ $partner->updated_at->format('d M Y, H:i') }}
                    </td>
                    <td style="text-align:center;">
                        <div style="display:flex;gap:0.4rem;justify-content:center;">
                            <a href="{{ route('admin.partners.edit', $partner) }}"
                               class="btn btn-warning btn-sm"
                               id="btn-edit-partner-{{ $partner->id }}">
                                ✏️ Edit
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.partners.destroy', $partner) }}"
                                  id="form-delete-partner-{{ $partner->id }}"
                                  onsubmit="return confirm('Yakin ingin menghapus partner {{ $partner->name }}?')">
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
                    <td colspan="6">
                        <div class="empty-state">
                            <div class="icon">🤝</div>
                            <p>Belum ada partner{{ $search ? ' yang ditemukan' : '' }}.</p>
                            @if(!$search)
                                <a href="{{ route('admin.partners.create') }}" class="btn btn-primary" style="margin-top:0.75rem;">
                                    ➕ Tambah Partner Pertama
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
