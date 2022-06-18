@extends('masteradmin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <h1 class="baru text-center">Tagihan Peminjaman</h1>
            <div class="row mt-2">
                @foreach($peminjaman as $p)
                <div class="col-md-3">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-around pb-2">
                                <div class=" pb-2 pb-md-0 text-center">
                                    <img src="{{ asset('storage/'. $p->foto_peminjam) }}" width="100%" alt="">
                                    <div class="card-title mt-3 baru text-center">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                Peminjam : {{$p->user?->name}}
                                            </div>
                                            <div class="col-12">
                                                Mobil : {{$p->mobil?->nama_mobil}}
                                            </div>
                                            <div class="col-12">
                                                Total : Rp {{ number_format((int)$p->mobil?->harga_sewa_mobil * (Carbon\Carbon::parse($p->pengembalian)->diffInDays($p->peminjaman))) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection