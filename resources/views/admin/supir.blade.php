@extends('masteradmin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <h1 class="baru text-center">Data Supir</h1>
            <div class="row mt-2">
                @foreach($supir as $s)
                <div class="col-md-3">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-around pb-2">
                                <div class=" pb-2 pb-md-0 text-center">
                                    <img src="{{ asset('storage/'. $s->foto) }}" width="100%" alt="">
                                    <div class="card-title mt-3 baru text-center">{{$s->nama}}</div>
                                    <b>{{$s->umur}} tahun</b>
                                </div>
                            </div>
                            <!-- modal ubah data supir -->
                            <div class="modal fade" id="modalmobil{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="modalmobilLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title baru" id="modalmobilLabel">Ubah Data Supir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('editdatasupir',$s->id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label baru">Nama</label>
                                                    <input type="text" name="nama" value="{{ $s->nama }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label baru">Umur</label>
                                                    <input type="iteger" name="umur" value="{{ $s->umur }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label baru">Foto</label>
                                                    <input type="file" name="foto" value="{{ $s->foto }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/'. $s->foto) }}" alt="" width="30%">
                                                </div>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- endmodal -->
                            <div class="text-center">
                                <a class="btn btn-warning"data-toggle="modal" data-target="#modalmobil{{$s->id}}"><i class="fas fa-pen"></i></a>
                                <a href="{{ url('deletedatasupir',$s->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title baru" id="modalmobilLabel">Tambah Data Supir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tambahdatasupir" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label baru">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label baru">Umur</label>
                        <input type="integer" name="umur" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label baru">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- endmodal -->

@endsection