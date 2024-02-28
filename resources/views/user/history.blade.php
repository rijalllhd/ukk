@extends('user.layout')

@section('page')
  History
@endsection

@section('title')
  <h2 class="page-title">History</h2>
@endsection

@section('content')


  <div class="row justify-content-center">

    @if(Session::get('success'))
      <div class="alert alert-success alert-dismissible col-8" role="alert">
        <div class="d-flex">
          <div>
            <h4 class="alert-title">Peminjaman Berhasil Dibuat!</h4>
            <div class="text-secondary">{{Session::get('success')}}</div>
          </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
      </div>
    @endif
    @if(Session::get('error'))
      <div class="alert alert-danger alert-dismissible col-8" role="alert">
        <div class="d-flex">
          <div>
            <h4 class="alert-title">Peminjaman Gagal Dibuat!</h4>
            <div class="text-secondary">{{Session::get('error')}}</div>
          </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
      </div>
    @endif


    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <div class="divide-y">
            @foreach($history as $histori)
              <div class="row">
                <div class="col">
                  <div class="text-truncate">
                    <strong>{{Auth::user()->username}}</strong> meminjam buku <strong>"{{$histori->buku->judul}}"</strong>
                  </div>
                  <div class="text-muted">
                    {{\Carbon\Carbon::parse($histori->created_at)->format('d/m/Y')}}
                  </div>
                </div>
                <div class="col-auto align-self-center">
                  @if($histori->status == "P")
                    <div class="badge bg-info">Dalam proses</div>
                  @elseif($histori->status == "I")
                    <div class="badge bg-success">Diterima</div>
                  @elseif($histori->status == "T")
                    <div class="badge bg-danger">Ditolak</div>
                  @elseif($histori->status == "B")
                    <div class="badge bg-warning">Sedang Dipinjam</div>
                  @else
                    <div class="badge bg-secondary">Selesai Dipinjam</div>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>




  </div>



@endsection