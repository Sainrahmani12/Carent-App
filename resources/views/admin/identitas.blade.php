@extends('masteradmin')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <h1 class="baru text-center">Identitas Peminjaman</h1>
            <div class="row">
                <div class="header-body container">
                    <div class="row align-items-center"></div>
                    <table class="table align-items-center table-secondary table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="name">No</th>
                                <th scope="col" class="sort text-center" data-sort="budget">Nama Peminjam</th>
                                <th scope="col" class="sort text-center" data-sort="budget">Nama Mobil</th>
                                <th scope="col" class="sort text-center" data-sort="status">Jaminan</th>
                                <th scope="col" class="sort text-center" data-sort="status">Supir</th>
                                <th scope="col" class="sort text-center" data-sort="status">Foto Peminjam</th>
                                <th scope="col" class="sort text-center" data-sort="status">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($peminjaman as $p)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$p->user->name}}</td>
                                <td class="text-center">{{$p->mobil?->nama_mobil}}</td>
                                <td class="text-center">{{$p->jaminan}}</td>
                                <td class="text-center">{{$p->supir?->nama}}</td>
                                <td class="text-center"><img src="{{ asset('storage/'. $p->foto_peminjam) }}" width="75" alt=""></td>
                                <td class="text-center">
                                    <div class="text-center">
                                        <a class="btn btn-warning" data-toggle="modal" data-target="#modalmobil{{$p->id}}"><i class="fas fa-pen"></i></a>
                                        <a href="{{ url('deleteidentitas',$p->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                                <!-- modal ubah data supir -->
                                <div class="modal fade" id="modalmobil{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modalmobilLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title baru" id="modalmobilLabel">Ubah Identitas Peminjam</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('updateidentitas',$p->id) }}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label baru">Nama Mobil</label>
                                                        <select name="datamobil_id" class="form-control">
                                                            @foreach ($mobil as $m)
                                                            <option value="{{$m->id}}">{{$m->nama_mobil}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label baru">Jaminan</label>
                                                        <input type="iteger" name="jaminan" value="{{ $p->jaminan }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label baru">Supir</label>
                                                        <select name="supir_id" class="form-control">
                                                            @foreach ($supir as $s)
                                                            <option value="{{$s->id}}">{{$s->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Peminjaman</label>
                                                        <input type="date" name="peminjaman" value="{{ $p->peminjaman }}" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Pengembalian</label>
                                                        <input type="date" name="pengembalian" value="{{ $p->pengembalian }}" class="form-control">
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label baru">Foto</label>
                                                        <input type="file" name="foto_peminjam" value="{{ $p->foto }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <img src="{{ asset('storage/'. $p->foto_peminjam) }}" alt="" width="30%">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- endmodal -->
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