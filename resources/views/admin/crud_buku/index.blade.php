@extends('admin.layout')


@section('title')
    <h3>Data Buku</h3>
@endsection


@section('content')
    
    <section class="section">
        <div class="row" id="table-striped">
            
            <div class="float-end">
                <a href="#" class="btn icon icon-left btn-success mb-3 col-2 float-end" data-bs-toggle="modal"
                                    data-bs-target="#create_form"><i class="bi bi-file-earmark-plus me-2"></i>Tambah Data</a>
            </div>
            
            <div class="col-12">

                @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{Session::get('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible show fade">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">

                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><img src="{{ asset($item->cover) }}" alt="img" style="width:90px; height:120px; object-fit: cover;"></td>
                                        <td class="text-bold-500">{{ $item->judul }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td>{{ $item->jumlah_buku }}</td>
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#kategori_form{{$item->id}}"><i class="bi bi-bookmarks-fill"></i><span class="ms-2">Kategori</span></a></td>
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#info_form{{$item->id}}"><i class="bi bi-info-circle me-2"></i></a>
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
            
            
            @foreach ($data as $item)
            <!--Kategori form Modal -->
            <div class="modal fade text-left" id="kategori_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Kategori Buku ({{$item->judul}}) </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">Judul</td>
                                        <td>{{$item->judul}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Kategori</td>
                                        <td>@foreach ($kategori_buku_relasi as $kategori_relasi)
                                                @if ($item->id == $kategori_relasi->buku_id)
                                                    {{$kategori_relasi->kategori_buku->nama_kategori}}
                                                    <form action="{{ url('admin/buku/kategori/'.$kategori_relasi->id) }}" method="post" class="mb-3">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-dismiss="modal">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach  
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <form action="{{ url('admin/buku/kategori') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input id="buku" name="buku_id" type="hidden" class="form-control" value="{{ $item->id }}">
                                <select name="kategori_id" class="form-select" id="basicSelect">
                                        <option disable>Tambah Jenis Kategori</option>
                                    @foreach ($kategori_buku as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                    @endforeach
                                </select>
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
            @foreach ($kategori_buku as $kategori)
            <!--Info form Modal -->
            <div class="modal fade text-left" id="info_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Info Buku ({{$item->judul}}) </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">Judul</td>
                                        <td>{{$item->judul}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Penulis</td>
                                        <td>{{$item->penulis}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Penerbit</td>
                                        <td>{{$item->penerbit}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Sinopsis</td>
                                        <td>{{$item->sinopsis}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Tahun Terbit</td>
                                        <td>{{$item->tahun_terbit}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Jumlah Buku</td>
                                        <td>{{$item->jumlah_buku}} <span class="text-success">Tersedia</span></td>
                                    </tr>
                                    <tr>
                                        <td class="">Kategori</td>
                                        <td>{{$kategori->nama_kategori}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Cover</td>
                                        <td><img src="{{asset($item->cover)}}" alt="img" style="width:130px; height:160px; object-fit: cover;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach


            <!--Create form Modal -->
            <div class="modal fade text-left" id="create_form" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Create Buku Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="judul">Judul: </label>
                                <div class="form-group">
                                    <input id="judul" name="judul" type="text" placeholder="Judul"
                                        class="form-control">
                                </div>
                                <label for="penulis">Penulis: </label>
                                <div class="form-group">
                                    <input id="penulis" name="penulis" type="text" placeholder="Penulis"
                                        class="form-control">
                                </div>
                                <label for="penerbit">Penerbit: </label>
                                <div class="form-group">
                                    <input id="penerbit" name="penerbit" type="text" placeholder="Penerbit"
                                        class="form-control">
                                </div>
                                <label for="sinopsis">sinopsis: </label>
                                <div class="form-group">
                                    <textarea id="sinopsis" name="sinopsis" type="text" placeholder="Sinopsis"
                                        class="form-control"></textarea>
                                </div>
                                <label for="tahun_terbit">Tahun Terbit: </label>
                                <div class="form-group">
                                    <input id="tahun_terbit" name="tahun_terbit" type="number" placeholder="Tahun Terbit"
                                        class="form-control">
                                </div>
                                <label for="jumlah_buku">Jumlah Buku: </label>
                                <div class="form-group">
                                    <input id="jumlah_buku" name="jumlah_buku" type="number" placeholder="Jumlah Buku"
                                        class="form-control">
                                </div>
                                <label for="cover">Cover Buku: </label>
                                <div class="form-group">
                                    <input id="cover" name="cover" type="file" placeholder="Cover Buku"
                                        class="form-control">
                                </div>
    
                                <!-- <label for="kategori">Kategori: </label>
                                <ul class="list-unstyled mb-0">
                                    @foreach ($kategori_buku as $kategori)
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox1" class="form-check-input" name="kategori[]" value="{{$kategori->id}}">
                                                    <label>{{$kategori->nama_kategori}}</label>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul> -->
                                
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
            </div>


            @foreach ($data as $item)
            <!-- edit form modal -->
            <div class="modal fade text-left" id="edit_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Buku ({{$item->judul}}) </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            
                            <form action="{{ url('admin/buku/'.$item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <label for="judul">Judul: </label>
                                    <div class="form-group">
                                        <input id="judul" name="judul" type="text" placeholder="{{$item->judul}}"
                                            class="form-control" value="{{ old('judul', $item->judul) }}">
                                    </div>
                                    <label for="penulis">Penulis: </label>
                                    <div class="form-group">
                                        <input id="penulis" name="penulis" type="text" placeholder="{{$item->penulis}}"
                                            class="form-control" value="{{ old('penulis', $item->penulis) }}">
                                    </div>
                                    <label for="penerbit">Penerbit: </label>
                                    <div class="form-group">
                                        <input id="penerbit" name="penerbit" type="text" placeholder="{{$item->penerbit}}"
                                            class="form-control" value="{{ old('penerbit', $item->penerbit) }}">
                                    </div>
                                    <label for="sinopsis">Sinopsis: </label>
                                    <div class="form-group">
                                        <textarea id="sinopsis" name="sinopsis" type="text" placeholder="{{$item->sinopsis}}"
                                            class="form-control" value="{{ old('sinopsis', $item->sinopsis) }}">{{$item->sinopsis}}</textarea>
                                    </div>
                                    <label for="tahun_terbit">Tahun Terbit: </label>
                                    <div class="form-group">
                                        <input id="tahun_terbit" name="tahun_terbit" type="number" placeholder="{{$item->tahun_terbit}}"
                                            class="form-control" value="{{ old('tahun_terbit', $item->tahun_terbit) }}">
                                    </div>
                                    <label for="jumlah_buku">Jumlah Buku: </label>
                                    <div class="form-group">
                                        <input id="jumlah_buku" name="jumlah_buku" type="number" placeholder="{{$item->jumlah_buku}}"
                                            class="form-control" value="{{ old('jumlah_buku', $item->jumlah_buku) }}">
                                    </div>
                                    <label for="cover">Cover Buku: </label>
                                    <div class="form-group">
                                        <input id="cover" name="cover" type="file" placeholder="{{$item->cover}}"
                                            class="form-control" value="{{ old('cover', $item->cover) }}">
                                    </div>

                                    <!-- <label for="kategori">Kategori: </label>
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($kategori_buku as $kategori)
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox1" class="form-check-input" name="kategori[]" value="{{$kategori->id}}">
                                                        <label>{{$kategori->nama_kategori}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul> -->
                                            
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
                            <h4 class="modal-title text-white" id="myModalLabel33">Delete Buku </h4>
                        </div>
                        <form action="{{ url('admin/buku/'.$item->id) }}" method="post">
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