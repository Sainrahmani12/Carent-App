@extends('masteradmin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <h1 class="baru text-center">Data Mobil</h1>
            <div class="row mt-2">
                @foreach($mobil as $m)
                <div class="col-md-3">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-around pb-2">
                                <div class=" pb-2 pb-md-0 text-center">
                                    <img src="{{ asset('storage/'. $m->gambar_mobil) }}" width="100%" alt="">
                                    <div class="card-title mt-3 baru text-center">{{$m->nama_mobil}}</div>
                                    <b>{{$m->harga_sewa_mobil}}</b>
                                </div>
                            </div>
                            <!-- modal ubah data mobil -->
                            <div class="modal fade" id="modalmobil{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="modalmobilLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title baru" id="modalmobilLabel">Ubah Data Mobil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('editdatamobil',$m->id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label baru">Nama Mobil</label>
                                                    <input type="text" name="nama_mobil" value="{{ $m->nama_mobil }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label baru">Harga Sewa Mobil</label>
                                                    <input type="iteger" name="harga_sewa_mobil" value="{{ $m->harga_sewa_mobil }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label baru">Gambar Mobil</label>
                                                    <input type="file" name="gambar_mobil" value="{{ $m->gambar_mobil }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/'. $m->gambar_mobil) }}" alt="" width="30%">
                                                </div>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- endmodal -->
                            <div class="text-center">
                                <a class="btn btn-warning"data-toggle="modal" data-target="#modalmobil{{$m->id}}"><i class="fas fa-pen"></i></a>
                                <a href="{{ url('deletedatamobil',$m->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="btn btn-success" data-toggle="modal" data-target="#modaltambahmobil" type="submit">CREATE</button>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- tambah data mobil -->
<div class="modal fade" id="modaltambahmobil" tabindex="-1" role="dialog" aria-labelledby="modalmobilLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title baru" id="modalmobilLabel">Tambah Data Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tambahdatamobil" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label baru">Nama Mobil</label>
                        <input type="text" name="nama_mobil" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label baru">Harga Sewa Mobil</label>
                        <input type="integer" name="harga_sewa_mobil" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label baru">Gambar Mobil</label>
                        <input type="file" name="gambar_mobil" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- endmodal -->

@endsection