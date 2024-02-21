@extends('user.layout')

@section('title')
  <h2 class="page-title">Dashboard</h2>
@endsection

@section('content')

  <h3 class="mb-0 pb-0">
    Buku Terbaru
  </h3>

  @for($i = 0; $i < count($bukubaru) && $i<8; $i++)
    <div class="col-md-6 col-lg-3">
      <div class="card card-link card-link-rotate">
        <div class="card-header">
          <h3 class="card-title">{{ $bukubaru[$i]->judul}}</h3>
        </div>
        <a href="" class="" data-bs-toggle="modal" data-bs-target="#info{{$bukubaru[$i]->id}}">
          <div class="card-body p-0">
            <img src="{{ asset( $bukubaru[$i]->cover) }}" alt="img" style="width:300px; height: 300px; object-fit: cover;">
          </div>
        <a>
        <div class="card-footer">
          <div class="card-actions">
            <a href="#" class="btn btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star me-1" viewBox="0 0 16 16">
                <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.18.18 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.18.18 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.18.18 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.18.18 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.18.18 0 0 0 .134-.098z"/>
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
              </svg>
              Favorit
            </a>
            <a href="#" class="btn btn-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots me-1" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
              </svg>
              Ulasan
            </a>
          </div>
        </div>
      </div>
    </div>
  @endfor

  <!-- info modal -->
  @for($i = 0; $i < count($bukubaru); $i++)
    <div class="modal modal-blur fade" id="info{{$bukubaru[$i]->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Info buku {{$bukubaru[$i]->judul}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                Judul Buku :
                            </td>
                            <td>
                                {{$bukubaru[$i]->judul}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Penulis :
                            </td>
                            <td>
                                {{$bukubaru[$i]->penulis}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Penerbit :
                            </td>
                            <td>
                                {{$bukubaru[$i]->penerbit}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sinopsis :
                            </td>
                            <td>
                                {{$bukubaru[$i]->sinopsis}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tahun Terbit :
                            </td>
                            <td>
                                {{$bukubaru[$i]->tahun_terbit}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jumlah Buku :
                            </td>
                            <td>
                                {{$bukubaru[$i]->jumlah_buku}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status :
                            </td>
                            <td>
                                @if($bukubaru[$i]->jumlah_buku > 0)
                                <span class="badge bg-success me-1"></span> Tersedia
                                @else
                                <span class="badge bg-danger me-1"></span> Tidak Tersedia
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Cover :
                            </td>
                            <td>
                                <img src="{{ asset( $bukubaru[$i]->cover) }}" alt="img" style="width:140px; height: 210px; object-fit: cover;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#pinjam{{$bukubaru[$i]->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus me-1" viewBox="0 0 16 16">
                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z"/>
                  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
              </svg>
              Pinjam
            </button>
          </div>
        </div>
      </div>
    </div>
  @endfor
  
  <!-- pinjem modal -->
  @for($i = 0; $i < count($bukubaru); $i++)
    <div class="modal modal-blur fade" id="pinjam{{$bukubaru[$i]->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">pinjam buku {{$bukubaru[$i]->judul}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="card" action="{{route('peminjaman.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                <h3 class="card-title">Formulir Meminjam Buku</h3>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label required">Nama Peminjam : {{Auth::user()->username}}</label>
                  <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Judul Buku : {{$bukubaru[$i]->judul}}</label>
                  <input type="text" name="buku_id" value="{{$bukubaru[$i]->id}}" hidden>
                </div>
                <div class="mb-3">
                  <label class="form-label required">Tanggal Pinjam</label>
                  <div class="input-icon">
                    <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                    </span>
                    <input class="form-control" name="tanggal_peminjaman" placeholder="Select a date" id="datepicker-icon-prepend" value="{{ date('Y-m-d') }}">
                  </div>
                </div>
                <div class="mb-8"></div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Ajukan Pijaman</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endfor


  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon-prepend'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });
    // @formatter:on
  </script>
  
  <div class="litepicker" data-plugins="" style="display: none; position: absolute; z-index: 9999; top: 103px; left: 520px;"><div class="container__main"><div class="container__months"><div class="month-item"><div class="month-item-header"><button type="button" class="button-previous-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg></button><div><strong class="month-item-name">June</strong><span class="month-item-year">2020</span></div><button type="button" class="button-next-month"><!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg></button></div><div class="month-item-weekdays-row"><div title="Monday">Mon</div><div title="Tuesday">Tue</div><div title="Wednesday">Wed</div><div title="Thursday">Thu</div><div title="Friday">Fri</div><div title="Saturday">Sat</div><div title="Sunday">Sun</div></div><div class="container__days"><div class="day-item" data-time="1590944400000" tabindex="0">1</div><div class="day-item" data-time="1591030800000" tabindex="0">2</div><div class="day-item" data-time="1591117200000" tabindex="0">3</div><div class="day-item" data-time="1591203600000" tabindex="0">4</div><div class="day-item" data-time="1591290000000" tabindex="0">5</div><div class="day-item" data-time="1591376400000" tabindex="0">6</div><div class="day-item" data-time="1591462800000" tabindex="0">7</div><div class="day-item" data-time="1591549200000" tabindex="0">8</div><div class="day-item" data-time="1591635600000" tabindex="0">9</div><div class="day-item" data-time="1591722000000" tabindex="0">10</div><div class="day-item" data-time="1591808400000" tabindex="0">11</div><div class="day-item" data-time="1591894800000" tabindex="0">12</div><div class="day-item" data-time="1591981200000" tabindex="0">13</div><div class="day-item" data-time="1592067600000" tabindex="0">14</div><div class="day-item" data-time="1592154000000" tabindex="0">15</div><div class="day-item" data-time="1592240400000" tabindex="0">16</div><div class="day-item" data-time="1592326800000" tabindex="0">17</div><div class="day-item" data-time="1592413200000" tabindex="0">18</div><div class="day-item" data-time="1592499600000" tabindex="0">19</div><div class="day-item is-start-date is-end-date" data-time="1592586000000" tabindex="0">20</div><div class="day-item" data-time="1592672400000" tabindex="0">21</div><div class="day-item" data-time="1592758800000" tabindex="0">22</div><div class="day-item" data-time="1592845200000" tabindex="0">23</div><div class="day-item" data-time="1592931600000" tabindex="0">24</div><div class="day-item" data-time="1593018000000" tabindex="0">25</div><div class="day-item" data-time="1593104400000" tabindex="0">26</div><div class="day-item" data-time="1593190800000" tabindex="0">27</div><div class="day-item" data-time="1593277200000" tabindex="0">28</div><div class="day-item" data-time="1593363600000" tabindex="0">29</div><div class="day-item" data-time="1593450000000" tabindex="0">30</div></div></div></div></div><div class="container__tooltip"></div>
  </div>

@endsection