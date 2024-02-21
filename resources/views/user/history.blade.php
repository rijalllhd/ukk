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
      <div class="alert alert-danger alert-dismissible col-8" role="alert">
        <div class="d-flex">
          <div>
            <h4 class="alert-title">{{Session::get('success')}}</h4>
            <div class="text-secondary">Your account has been saved!</div>
          </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
      </div>
    @endif


    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <div class="divide-y">
            <div>
              <div class="row">
                <div class="col-auto">
                  <span class="avatar">JL</span>
                </div>
                <div class="col">
                  <div class="text-truncate">
                    <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong> post.
                  </div>
                  <div class="text-muted">yesterday</div>
                </div>
                <div class="col-auto align-self-center">
                  <div class="badge bg-primary"></div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>




  </div>



@endsection