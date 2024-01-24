@extends('admin.layout')


@section('title')
    <h3>Data Petugas</h3>
@endsection


@section('content')
    
    <section class="section">
        <div class="row" id="table-striped">
            
            <div class="float-end">
                <a href="#" class="btn icon icon-left btn-success mb-3 col-2 float-end"><i class="bi bi-file-earmark-plus me-2"></i>Tambah Data</a>
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
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td class="text-bold-500">{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td><a href="#"><i class="bi bi-pencil-square me-2"></i></a>
                                            <a href=""><i class="bi bi-trash3"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection