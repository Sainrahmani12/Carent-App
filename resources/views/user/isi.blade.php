@extends('master')

@section('content')
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="img/jeep.png" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Rental Mobil</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Wedding - Healing - Boring</p>
    </div>
</header>

<!-- Mengapa -->

<div class="masthead bg-primary text-center">
    <div class="container de-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase text-white mb-0">Kenapa harus disini ?</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/05/14/1526299345537-5d57c269f121ecb9ae60be83d7688d53.svg?tr=q-75" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hemat Waktu</h5>
                        <p class="card-text">Sewa mobil cukup di genggaman Anda, kapan saja dan di mana saja. Bandingkan pilihan mobil dari partner tepercaya kami dengan mudah dan temukan yang sesuai dengan kebutuhan Anda. </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/05/14/1526299395599-27c9f8d3b8b182673dc9768a31eaa1d7.svg?tr=q-75" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Servis Berkualitas Dari Partner Tepercaya</h5>
                        <p class="card-text">Partner rental mobil Traveloka menyediakan servis berkualitas demi kenyamanan bepergian Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/05/14/1526299435281-ee34f2ae4efa6a2e73ebf5a810d5874a.svg?tr=q-75" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Rating Pengguna Asli</h5>
                        <p class="card-text">Ucapkan selamat tinggal pada keputusan yang tidak tepat. Rating dari user lain akan membantu Anda untuk menemukan pilihan rental mobil yang paling tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- endmengapa -->

<!-- Armada -->

<div class="masthead bg-primary text-center">
    <div class="container de-flex mb-5 align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase text-white mb-0" id="mobil">Armada Kami</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($mobil as $m)

            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title text-uppercase">{{$m->nama_mobil}}</h5>
                    </div>
                    <img src="{{ $m->gambar_mobil }}" class="card-img-top" alt="gambar-mobil">
                    @if(isset(Auth::user()->role))
                    @if(Auth::user()->role == 'user')
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format((int)$m->harga_sewa_mobil) }}/hari</h5>
                        <a href="/pemesanan"><button type="button" class="btn btn-outline-secondary mt-3 btn-sm">Booking Now</button></a>
                    </div>
                    @endif
                    @if(Auth::user()->role !== 'user')
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format((int)$m->harga_sewa_mobil) }}/hari</h5>
                        <a href="/pemesanan"><button type="button" class="btn btn-outline-secondary mt-3 btn-sm">Booking Now</button></a>
                    </div>
                    @endif
                    @else
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format((int)$m->harga_sewa_mobil) }}/hari</h5>
                        <button type="button" disabled class="btn btn-outline-secondary mt-3 btn-sm">Booking Now</button>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<!-- end Armada -->

<!-- driver -->

<div class="masthead bg-primary text-center">
    <div class="container mb-5 align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase text-white mb-0" id="supir">Driver Kami</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>
        <div class="row">
            @foreach ($supir as $s)
            <div class="col">
                <div class="card h-100">

                    <div class="card-body">
                        <div class="card-header">
                            <img src="{{ $s->foto }}" class="card-img-top" alt="gambar-mobil">
                        </div>
                        <h5 class="card-title mt-4 text-uppercase">{{$s->nama}}</h5>
                        <h5 class="card-title">{{$s->umur}} Tahun</h5>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<!-- end driver -->

<!-- peminjaman -->

<div class="masthead bg-primary text-center">
    <div class="container de-flex mb-5 align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase text-white mb-0">Jadwal</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>
        <section id="jadwal">
            <table class="table align-items-center table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">No</th>
                        <th scope="col" class="sort" data-sort="budget">Nama Peminjam</th>
                        <th scope="col" class="sort" data-sort="budget">Nama Mobil</th>
                        <th scope="col" class="sort" data-sort="status">Tanggal Peminjaman</th>
                        <th scope="col" class="sort" data-sort="status">Tanggal Pengembalian</th>
                        <th scope="col" class="sort" data-sort="status">Tagihan</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($peminjaman as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->user->name}}</td>
                        <td>{{$p->mobil?->nama_mobil}}</td>
                        <td>{{date('d-m-Y', strtotime($p->peminjaman))}}</td>
                        <td>{{date('d-m-Y', strtotime($p->pengembalian))}}</td>
                        <td>Rp {{ number_format((int)$p->mobil?->harga_sewa_mobil * (Carbon\Carbon::parse($p->pengembalian)->diffInDays($p->peminjaman))) }} ;</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>

<!-- end peminjaman -->
@endsection