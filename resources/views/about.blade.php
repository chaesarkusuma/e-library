@extends('layout.main')

@section('konten')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

<style>
    .font-playfair { font-family: 'Playfair Display', serif; }
    .font-crimson  { font-family: 'Crimson Text', serif; }
</style>

{{-- HERO --}}
<div class="relative bg-stone-900 overflow-hidden">
    {{-- decorative border --}}
    <div class="absolute inset-4 border border-yellow-600/30 pointer-events-none z-10"></div>

    <div class="relative z-20 text-center px-8 py-20">
        <span class="block text-yellow-500/70 tracking-[14px] text-lg mb-4">✦ &nbsp; ✦ &nbsp; ✦</span>
        <h1 class="font-playfair text-5xl md:text-6xl font-black text-yellow-200 leading-tight mb-3">
            Perpustakaan Digital
        </h1>
        <p class="font-crimson italic text-lg text-stone-300 tracking-wide">
            Membuka Pintu Pengetahuan untuk Semua
        </p>
        <div class="mx-auto mt-6 w-28 h-0.5 bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
    </div>
</div>

{{-- MAIN CONTENT --}}
<div class="bg-amber-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6 py-16 space-y-16">

        {{-- OPENING QUOTE --}}
        <div class="relative border-l-4 border-yellow-500 bg-amber-100 px-8 py-7 shadow-md">
            <span class="font-playfair absolute -top-4 left-4 text-8xl text-yellow-400/25 leading-none select-none">"</span>
            <p class="font-crimson italic text-xl text-stone-700 leading-relaxed">
                Sebuah buku adalah impian yang kamu pegang di tanganmu. Di sini, kami menghadirkan
                ribuan impian tersebut, siap untuk dijelajahi oleh siapa pun yang haus akan ilmu
                dan inspirasi.
            </p>
            <cite class="block mt-3 text-sm text-stone-500 tracking-widest uppercase not-italic">
                — Perpustakaan Digital Kami
            </cite>
        </div>

        {{-- TENTANG KAMI --}}
        <div>
            <div class="relative mb-5 pb-3 border-b-2 border-amber-200">
                <h2 class="font-playfair text-3xl font-bold text-stone-800">Tentang Kami</h2>
                <span class="absolute bottom-[-2px] left-0 w-14 h-0.5 bg-yellow-500"></span>
            </div>
            <p class="font-crimson text-lg text-stone-700 leading-relaxed mb-4">
                Selamat datang di <strong class="text-stone-900">Perpustakaan Digital</strong> — platform manajemen dan
                peminjaman buku berbasis web yang dirancang untuk memudahkan akses terhadap koleksi
                literatur kami. Kami hadir sebagai jembatan antara pembaca dan pengetahuan, memungkinkan
                siapa pun mengakses, meminjam, dan mengelola buku dari mana saja dan kapan saja.
            </p>
            <p class="font-crimson text-lg text-stone-700 leading-relaxed">
                Dibangun dengan semangat memajukan literasi dan budaya membaca, sistem kami menyediakan
                katalog buku yang lengkap, proses peminjaman yang mudah, serta riwayat transaksi yang
                transparan. Kami percaya bahwa pengetahuan adalah hak semua orang.
            </p>
        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-2 md:grid-cols-4 border border-amber-200 bg-amber-100 overflow-hidden divide-x divide-amber-200">
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span class="font-playfair text-4xl font-black text-stone-800 leading-none">5.000+</span>
                <span class="mt-2 text-xs text-stone-500 tracking-widest uppercase">Judul Buku</span>
            </div>
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span class="font-playfair text-4xl font-black text-stone-800 leading-none">1.200+</span>
                <span class="mt-2 text-xs text-stone-500 tracking-widest uppercase">Anggota Aktif</span>
            </div>
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span class="font-playfair text-4xl font-black text-stone-800 leading-none">20+</span>
                <span class="mt-2 text-xs text-stone-500 tracking-widest uppercase">Kategori</span>
            </div>
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span class="font-playfair text-4xl font-black text-stone-800 leading-none">24/7</span>
                <span class="mt-2 text-xs text-stone-500 tracking-widest uppercase">Akses Online</span>
            </div>
        </div>

        {{-- FITUR UNGGULAN --}}
        <div>
            <div class="relative mb-8 pb-3 border-b-2 border-amber-200">
                <h2 class="font-playfair text-3xl font-bold text-stone-800">Fitur Unggulan</h2>
                <span class="absolute bottom-[-2px] left-0 w-14 h-0.5 bg-yellowz-500"></span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">📖</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Katalog Lengkap</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Telusuri ribuan judul buku dari berbagai genre dan kategori dengan fitur pencarian yang cepat.</p>
                </div>

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">🔖</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Peminjaman Online</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Pinjam buku favorit Anda secara online tanpa antre. Proses cepat dan tercatat otomatis.</p>
                </div>

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">📊</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Riwayat Transaksi</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Pantau aktivitas peminjaman dan pengembalian buku secara real-time via dashboard pribadi.</p>
                </div>

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">🏛️</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Hall of Fame</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Apresiasi bagi pembaca paling aktif. Jadilah bagian dari komunitas literasi kami.</p>
                </div>

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">🔔</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Notifikasi Jatuh Tempo</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Pengingat otomatis agar Anda tidak lupa mengembalikan buku tepat waktu.</p>
                </div>

                <div class="bg-white border border-amber-100 border-t-4 border-t-yellow-500 p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-4 block">🔐</span>
                    <h3 class="font-playfair text-lg font-bold text-stone-800 mb-2">Akun Aman</h3>
                    <p class="font-crimson text-stone-600 leading-relaxed">Data anggota dijaga dengan keamanan tinggi. Login mudah dan privasi selalu terlindungi.</p>
                </div>

            </div>
        </div>

        {{-- VISI & MISI --}}
        <div>
            <div class="relative mb-8 pb-3 border-b-2 border-amber-200">
                <h2 class="font-playfair text-3xl font-bold text-stone-800">Visi & Misi</h2>
                <span class="absolute bottom-[-2px] left-0 w-14 h-0.5 bg-yellow-500"></span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="relative bg-stone-900 p-8 overflow-hidden">
                    <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-yellow-500/10"></div>
                    <h3 class="font-playfair text-xl font-bold text-yellow-300 mb-4 flex items-center gap-2">
                        🌟 Visi
                    </h3>
                    <p class="font-crimson text-stone-300 leading-relaxed text-lg">
                        Menjadi perpustakaan digital terdepan yang mendorong budaya membaca dan
                        memperluas akses pengetahuan bagi seluruh lapisan masyarakat.
                    </p>
                </div>

                <div class="relative bg-stone-800 p-8 overflow-hidden">
                    <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-yellow-500/10"></div>
                    <h3 class="font-playfair text-xl font-bold text-yellow-300 mb-4 flex items-center gap-2">
                        🎯 Misi
                    </h3>
                    <p class="font-crimson text-stone-300 leading-relaxed text-lg">
                        Menyediakan layanan peminjaman buku yang mudah, transparan, dan efisien,
                        serta membangun komunitas pembaca yang aktif dan berpengetahuan luas.
                    </p>
                </div>

            </div>
        </div>

        {{-- CLOSING BAND --}}
        <div class="relative bg-gradient-to-br from-stone-900 to-stone-700 text-center px-10 py-14 overflow-hidden">
            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-8xl opacity-[0.05] select-none">📖</span>
            <span class="absolute right-2 top-1/2 -translate-y-1/2 text-8xl opacity-[0.05] select-none">📚</span>
            <h2 class="font-playfair text-3xl font-bold text-yellow-200 mb-3">Mari Mulai Membaca</h2>
            <p class="font-crimson italic text-stone-300 text-lg max-w-md mx-auto leading-relaxed">
                Bergabunglah bersama kami dan jadikan membaca sebagai bagian dari
                perjalanan hidupmu setiap hari.
            </p>
        </div>

    </div>
</div>

@endsection