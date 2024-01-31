@extends('admin.layout')


@section('title')
    <h3>Data Kategori</h3>
@endsection


@section('content')
    
    <section class="section">
        <div class="row" id="table-striped">
            
            <div class="float-end">
                <a href="#" class="btn icon icon-left btn-success mb-3 col-2 float-end" data-bs-toggle="modal"
                                    data-bs-target="#create_form"><i class="bi bi-file-earmark-plus me-2"></i>Tambah Data</a>
            </div>
            
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit_form{{$item->id}}"><i class="bi bi-pencil-square me-2"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete_form{{$item->id}}"><i class="bi bi-trash3"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!--Create form Modal -->
            <div class="modal fade text-left" id="create_form" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Create Kategori Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{route('kategori.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <label for="judul">Nama Kategori: </label>
                                <div class="form-group">
                                    <input id="nama_kategori" name="nama_kategori" type="text" placeholder="Nama Kategori"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tambah</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach ($data as $item)
            <!--Edit form Modal -->
            <div class="modal fade text-left" id="edit_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Kategori Form ({{$item->nama_kategori}}) </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ url('admin/kategori/'.$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="Nama Kategori">Nama Kategori: </label>
                                <div class="form-group">
                                    <input id="nama_kategori" name="nama_kategori" type="text" placeholder="{{$item->nama_kategori}}"
                                        class="form-control" value="{{ old('nama_kategori', $item->nama_kategori) }}">
                                </div>
                                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($data as $item)
            <!--Delete form Modal -->
            <div class="modal fade text-left" id="delete_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-white" id="myModalLabel33">Delete Kategori </h4>
                        </div>
                        <form action="{{ url('admin/kategori/'.$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <label for="">Apa kamu yakin menghapus data ini ?!?!? </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Kembali</span>
                                </button>
                                <button type="submit" class="btn btn-danger ms-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block text-white">Hapus</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </section>

@endsection