<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AmikomEventHub - Platform event terkemuka di Amikom. Temukan dan ikuti berbagai event seru bersama partner kami.">
    <title>AmikomEventHub - Platform Event Amikom</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #6c63ff;
            --primary-light: #8b84ff;
            --secondary: #ff6584;
            --accent: #43e97b;
            --bg: #0f0e17;
            --bg-card: #1a1a2e;
            --border: #2a2a4a;
            --text: #e8e8f0;
            --text-muted: #8888aa;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        /* =====================
           NAVBAR
        ===================== */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 999;
            background: rgba(15, 14, 23, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            font-size: 1.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover { color: var(--primary); }

        .nav-admin-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.45rem 1rem;
            background: var(--primary);
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .nav-admin-btn:hover {
            background: #5548e0;
            transform: translateY(-1px);
        }

        /* =====================
           HERO
        ===================== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 6rem 1.5rem 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -200px; left: 50%;
            transform: translateX(-50%);
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(108, 99, 255, 0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px; right: -100px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255, 101, 132, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 1rem;
            background: rgba(108, 99, 255, 0.15);
            border: 1px solid rgba(108, 99, 255, 0.4);
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary-light);
            margin-bottom: 1.5rem;
            animation: fadeInDown 0.6s ease;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.25rem;
            animation: fadeInUp 0.6s ease 0.1s both;
        }

        .hero h1 .gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 560px;
            line-height: 1.7;
            margin-bottom: 2rem;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 0.6s ease 0.3s both;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            box-shadow: 0 4px 20px rgba(108, 99, 255, 0.4);
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(108, 99, 255, 0.5);
        }

        .btn-hero-outline {
            border: 1px solid var(--border);
            color: var(--text);
            background: rgba(255,255,255,0.04);
        }

        .btn-hero-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Stats */
        .stats-row {
            display: flex;
            gap: 3rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 4rem;
            animation: fadeInUp 0.6s ease 0.4s both;
        }

        .stat-item { text-align: center; }
        .stat-number {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .stat-label { font-size: 0.8rem; color: var(--text-muted); margin-top: 2px; }

        /* =====================
           SECTIONS
        ===================== */
        section {
            padding: 5rem 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-badge {
            display: inline-block;
            padding: 0.3rem 0.9rem;
            background: rgba(108, 99, 255, 0.12);
            border: 1px solid rgba(108, 99, 255, 0.3);
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary-light);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 800;
            margin-bottom: 0.75rem;
        }

        .section-desc {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* =====================
           CATEGORIES
        ===================== */
        .categories-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
        }

        .category-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1.1rem;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text);
            transition: all 0.2s;
            cursor: default;
        }

        .category-chip:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: rgba(108, 99, 255, 0.08);
            transform: translateY(-2px);
        }

        /* =====================
           PARTNERS GRID
        ===================== */
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .partner-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem 1.5rem;
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .partner-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .partner-card:hover {
            border-color: rgba(108, 99, 255, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(108, 99, 255, 0.12);
        }

        .partner-card:hover::before { opacity: 1; }

        .partner-logo-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            overflow: hidden;
        }

        .partner-logo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }

        .partner-logo-placeholder {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin: 0 auto 1rem;
        }

        .partner-name {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .partner-meta {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Empty state */
        .empty-partners {
            text-align: center;
            padding: 4rem 1rem;
            color: var(--text-muted);
            grid-column: 1 / -1;
        }

        .empty-partners .emoji { font-size: 4rem; margin-bottom: 1rem; }

        /* =====================
           FOOTER
        ===================== */
        footer {
            background: var(--bg-card);
            border-top: 1px solid var(--border);
            padding: 2.5rem 1.5rem;
            text-align: center;
        }

        .footer-brand {
            font-size: 1.1rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .footer-text {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* =====================
           ANIMATIONS
        ===================== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            nav { gap: 1rem; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav>
        <span class="nav-brand">⚡ AmikomEventHub</span>
        <ul class="nav-links">
            <li><a href="#partners">Partner</a></li>
            <li><a href="#categories">Kategori</a></li>
        </ul>
        <a href="{{ route('admin.categories.index') }}" class="nav-admin-btn" id="btn-admin-panel">
            🔧 Admin Panel
        </a>
    </nav>

    {{-- HERO SECTION --}}
    <section class="hero" id="hero">
        <div class="hero-badge">🎉 Platform Event #1 di Amikom</div>
        <h1>
            Temukan Event<br>
            <span class="gradient">Luar Biasa</span> Bersamamu
        </h1>
        <p>
            AmikomEventHub adalah platform terpadu untuk menemukan, mendaftar, dan mengelola event di lingkungan Universitas Amikom. Didukung oleh partner-partner terpercaya.
        </p>
        <div class="hero-buttons">
            <a href="#partners" class="btn-hero btn-hero-primary">Lihat Partner ↓</a>
            <a href="#categories" class="btn-hero btn-hero-outline">Kategori Event</a>
        </div>
        <div class="stats-row">
            <div class="stat-item">
                <div class="stat-number">{{ $partners->count() }}+</div>
                <div class="stat-label">Partner Aktif</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $categories->count() }}+</div>
                <div class="stat-label">Kategori Event</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100+</div>
                <div class="stat-label">Event Digelar</div>
            </div>
        </div>
    </section>

    {{-- PARTNERS SECTION (Soal 4) --}}
    <section id="partners" style="max-width:1200px;margin:0 auto;padding:5rem 1.5rem;">
        <div class="section-header">
            <div class="section-badge">🤝 Mitra Kami</div>
            <h2 class="section-title">Partner AmikomEventHub</h2>
            <p class="section-desc">
                Kami berkolaborasi dengan berbagai organisasi dan perusahaan terkemuka untuk menghadirkan event berkualitas.
            </p>
        </div>

        <div class="partners-grid">
            @forelse($partners as $partner)
                {{-- Soal 4: @foreach Blade untuk merender daftar Partner --}}
                <div class="partner-card" id="partner-card-{{ $partner->id }}">
                    @if($partner->logo_url)
                        <div class="partner-logo-wrapper">
                            <img
                                src="{{ $partner->logo_url }}"
                                alt="{{ $partner->name }}"
                                onerror="this.parentElement.innerHTML='<span style=\'font-size:1.75rem;\'>🤝</span>'"
                            >
                        </div>
                    @else
                        <div class="partner-logo-placeholder">🤝</div>
                    @endif

                    <div class="partner-name">{{ $partner->name }}</div>
                    <div class="partner-meta">Bergabung {{ $partner->created_at->format('M Y') }}</div>
                </div>
            @empty
                <div class="empty-partners">
                    <div class="emoji">🤝</div>
                    <p style="font-size:1rem;font-weight:600;margin-bottom:0.4rem;">Belum ada partner</p>
                    <p style="font-size:0.875rem;">Partner akan ditampilkan di sini.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- CATEGORIES SECTION (Soal 4 bonus) --}}
    <section id="categories" style="max-width:1200px;margin:0 auto;padding:5rem 1.5rem;">
        <div class="section-header">
            <div class="section-badge">🏷️ Kategori Platform</div>
            <h2 class="section-title">Kategori AmikomEventHub</h2>
            <p class="section-desc">
                Jelajahi berbagai kategori event yang tersedia di platform kami.
            </p>
        </div>

        <div class="categories-grid">
            @forelse($categories as $category)
                {{-- @foreach untuk merender kategori di sisi publik --}}
                <div class="category-chip" id="category-chip-{{ $category->id }}">
                    🏷️ {{ $category->name }}
                </div>
            @empty
                <p style="color:var(--text-muted);text-align:center;width:100%;">Belum ada kategori.</p>
            @endforelse
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-brand">⚡ AmikomEventHub</div>
        <p class="footer-text">
            Platform Event Universitas Amikom &copy; {{ date('Y') }} — Dibuat dengan ❤️
        </p>
    </footer>

</body>
</html>
