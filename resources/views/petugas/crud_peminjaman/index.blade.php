@extends('petugas.layout')

@section('page')
    Data Peminjaman - Petugas
@endsection

@section('title')
    <h3>Data Peminjaman</h3>
@endsection


@section('content')
    
    <section class="section">
        <div class="row" id="table-striped">
           
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
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
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
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal pinjam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->tanggal_peminjaman }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#info_form{{$item->id}}"><i class="bi bi-info-circle me-2"></i></a>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            

            @foreach ($data as $item)
            <!--Acc form Modal -->
            <div class="modal fade text-left" id="info_form{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Info Buku ({{$item->buku->judul}}) </h4>
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
                                        <td class="">Peminjam</td>
                                        <td>{{$item->user->nama_lengkap}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Judul</td>
                                        <td>{{$item->buku->judul}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Kode Peminjaman</td>
                                        <td>{{$item->kode_peminjaman}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Tanggal Pinjam</td>
                                        <td>{{$item->tanggal_peminjaman}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Tanggal Kembali</td>
                                        <td>{{$item->tanggal_kembali}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Jumlah Buku</td>
                                        <td>
                                            @if($item->buku->jumlah_buku > 0)
                                                {{$item->buku->jumlah_buku}} <span class="text-success">Tersedia</span>
                                            @else
                                                <span class="text-danger">Tidak Tersedia</span>
                                            @endif
                                        </td>
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

            


        </div>


    </section>

@endsection