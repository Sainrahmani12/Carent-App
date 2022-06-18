@extends('masteradmin')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <h1 class="baru text-center">Jadwal Peminjaman</h1>
            <div class="row">
                <div class="header-body container">
                    <div class="row align-items-center"></div>
                    <table class="table align-items-center table-secondary table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="name">No</th>
                                <th scope="col" class="sort text-center" data-sort="budget">Nama Peminjam</th>
                                <th scope="col" class="sort text-center" data-sort="budget">Nama Mobil</th>
                                <th scope="col" class="sort text-center" data-sort="status">Tanggal Peminjaman</th>
                                <th scope="col" class="sort text-center" data-sort="status">Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($peminjaman as $p)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$p->user->name}}</td>
                                <td class="text-center">{{$p->mobil?->nama_mobil}}</td>
                                <td class="text-center">{{date('d-m-Y', strtotime($p->peminjaman))}}</td>
                                <td class="text-center">{{date('d-m-Y', strtotime($p->pengembalian))}}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection