@extends('admin.layouts.app')

@section('page-title', 'Edit Partner')

@section('content')
<div class="card" style="max-width:560px;">
    <div class="card-header">
        <div>
            <h2 class="card-title">✏️ Edit Partner</h2>
            <p style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">Ubah data partner #{{ $partner->id }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.partners.update', $partner) }}" id="form-edit-partner-{{ $partner->id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Nama Partner</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Nama partner..."
                value="{{ old('name', $partner->name) }}"
                required
                autofocus
            >
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="logo_url">URL Logo <span style="color:var(--text-muted);font-weight:400;">(opsional)</span></label>
            <input
                type="url"
                id="logo_url"
                name="logo_url"
                class="form-control"
                placeholder="https://example.com/logo.png"
                value="{{ old('logo_url', $partner->logo_url) }}"
            >
            @error('logo_url')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            {{-- Preview logo --}}
            <div id="logo-preview-wrapper" style="margin-top:0.75rem;{{ old('logo_url', $partner->logo_url) ? '' : 'display:none;' }}">
                <p style="font-size:0.75rem;color:var(--text-muted);margin-bottom:0.35rem;">Preview Logo:</p>
                <img id="logo-preview-img"
                     src="{{ old('logo_url', $partner->logo_url) }}"
                     alt="Preview"
                     style="height:60px;object-fit:contain;background:#fff;padding:4px 8px;border-radius:6px;border:1px solid var(--border);">
            </div>
        </div>

        <div style="font-size:0.75rem;color:var(--text-muted);margin-bottom:1rem;">
            Dibuat: {{ $partner->created_at->format('d M Y, H:i') }} &nbsp;|&nbsp;
            Diperbarui: {{ $partner->updated_at->format('d M Y, H:i') }}
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning" id="btn-update-partner">
                💾 Perbarui Partner
            </button>
            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>
    </form>
</div>

<script>
    const logoInput = document.getElementById('logo_url');
    const previewWrapper = document.getElementById('logo-preview-wrapper');
    const previewImg = document.getElementById('logo-preview-img');

    logoInput.addEventListener('input', function () {
        const url = this.value.trim();
        if (url) {
            previewImg.src = url;
            previewWrapper.style.display = 'block';
        } else {
            previewWrapper.style.display = 'none';
        }
    });
</script>
@endsection
