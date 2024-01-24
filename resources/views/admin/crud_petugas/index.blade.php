@extends('admin.layout')


@section('title')
    <h3>Data Petugas</h3>
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
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#edit_form"><i class="bi bi-pencil-square me-2"></i></a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#delete_form"><i class="bi bi-trash3"></i></a></td>
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
                            <h4 class="modal-title" id="myModalLabel33">Create Petugas Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label for="nama_lengkap">Nama lengkap: </label>
                                <div class="form-group">
                                    <input id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Nama lengkap"
                                        class="form-control">
                                </div>
                                <label for="username">Username: </label>
                                <div class="form-group">
                                    <input id="username" name="username" type="text" placeholder="Username"
                                        class="form-control">
                                </div>
                                <label for="alamat">Alamat: </label>
                                <div class="form-group">
                                    <input id="alamat" name="alamat" type="text" placeholder="Alamat"
                                        class="form-control">
                                </div>
                                <label for="email">Email: </label>
                                <div class="form-group">
                                    <input id="email" name="email" type="text" placeholder="Email Address"
                                        class="form-control">
                                </div>
                                <label for="password">Password: </label>
                                <div class="form-group">
                                    <input id="password" name="password" type="password" placeholder="Password"
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
                                    <span class="d-none d-sm-block">login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!--Edit form Modal -->
            <div class="modal fade text-left" id="edit_form" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Petugas Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label for="nama_lengkap">Nama lengkap: </label>
                                <div class="form-group">
                                    <input id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Nama lengkap"
                                        class="form-control">
                                </div>
                                <label for="username">Username: </label>
                                <div class="form-group">
                                    <input id="username" name="username" type="text" placeholder="Username"
                                        class="form-control">
                                </div>
                                <label for="alamat">Alamat: </label>
                                <div class="form-group">
                                    <input id="alamat" name="alamat" type="text" placeholder="Alamat"
                                        class="form-control">
                                </div>
                                <label for="email">Email: </label>
                                <div class="form-group">
                                    <input id="email" name="email" type="text" placeholder="Email Address"
                                        class="form-control">
                                </div>
                                <label for="password">Password: </label>
                                <div class="form-group">
                                    <input id="password" name="password" type="password" placeholder="Password"
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
                                    <span class="d-none d-sm-block">login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Delete form Modal -->
            <div class="modal fade text-left" id="delete_form" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-white" id="myModalLabel33">Delete Petugas Form </h4>
                        </div>
                        <form action="#">
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


        </div>
    </section>

@endsection