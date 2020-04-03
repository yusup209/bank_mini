<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">bankMini</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @if(Auth::user()->status == "superadmin")
            <li class="menu-header">Master Data</li>
            <li class="nav-item">
                <a href="{{ route('dataNasabah.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Nasabah</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dataAkun.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Akun</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dataKelas.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Kelas</span></a>
            </li>

            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="{{ route('dataTransaksi.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Transaksi</span></a>
            </li>

            <li class="menu-header">Rekening</li>
            <li class="nav-item">
                <a href="{{ route('dataAkunInetBanking.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Akun Internet Banking</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('autoDebit.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Autodebit</span></a>
            </li>
            @elseif(Auth::user()->status == "teller")
            <li class="menu-header">Rekening</li>
            <li class="nav-item">
                <a href="{{ route('buatRekening.create') }}" class="nav-link"><i class="fas fa-money-check"></i> <span>Buat Rekening Baru</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('regisInetBanking.create') }}" class="nav-link"><i class="fas fa-network-wired"></i> <span>Regis. Internet Banking</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-dollar-sign"></i> <span>Autodebit</span></a>
            </li>

            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="{{ route('setorTunai.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Setor Tunai</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tarikTunai.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Tarik Tunai</span></a>
            </li>
            @elseif(Auth::user()->status == "user")
            <li class="menu-header">Tabungan</li>
            <li class="nav-item">
                <a href="{{ route('tabungan.index') }}" class="nav-link"><i class="fas fa-hand-holding-usd"></i> <span>Saldo</span></a>
            </li>

            {{--<li class="menu-header">Pembayaran</li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.index') }}" class="nav-link"><i class="fas fa-hand-holding-usd"></i> <span>Pembayaran</span></a>
            </li>--}}

            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="{{ route('transfer.create') }}" class="nav-link"><i class="fas fa-hand-holding-usd"></i> <span>Transfer</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('riwayatTransaksi.index') }}" class="nav-link"><i class="fas fa-hand-holding-usd"></i> <span>Riwayat Transaksi</span></a>
            </li>
            @endif
        </ul>
    </aside>
</div>