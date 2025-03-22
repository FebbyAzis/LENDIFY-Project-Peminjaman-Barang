@extends('layout.app')
@section('content')  
<section class="section">
<div class="section-header">
    <h1>Pinjaman</h1>
    <div class="section-header-breadcrumb">
  
      <div class="breadcrumb-item active"><a href="{{url('/dashboard-users')}}">Dashboard</a></div>
      
      <div class="breadcrumb-item">Pinjaman</div>
    </div>
  </div>
  @if (session('Success'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('Success') }}.
      </div>
    </div>
    @endif

    @if (session('Successs'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('Successs') }}.
      </div>
    </div>
    @endif

    @if (session('pengembalian'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('pengembalian') }}.
      </div>
    </div>
    @endif

    @if (session('Ssuccess'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('Ssuccess') }}.
      </div>
    </div>
    @endif
  <div class="section-body">
      <div class="row">
          <div class="col-sm-9">
              <h2 class="section-title">Riwayat Pinjaman</h2>
              <p class="section-lead">
                Anda dapat melihat riwayat pinjaman dan melakukan pengembalian barang pinjaman pada halaman ini.
              </p>
          </div>
       
         
      
      </div>
  

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Pinjaman Aktif</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>                                 
                  <tr>
                    <th>No</th>
                    <th>Nama barang</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Pinjaman</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pA as $no=>$item)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$item->barang->nama_barang}}</td>
                            <td>{{date("d/M/Y", strtotime($item->tgl_pinjaman));}}</td>
                            @if ($item->tgl_pengembalian == null)
                                <td>-</td>
                            @else
                            <td>{{date("d/M/Y", strtotime($item->tgl_pengembalian));}}</td>
                            @endif
                            
                            @if ($item->status_pinjaman == 1)
                                <td>Dipinjam</td>
                            @else
                                <td>Dikembalikan</td>
                            @endif
                      
                            <td>
                                
                                <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModal1{{$item->id}}">
                                    <i class="fas fa-edit"> Kembalikan</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>   

            </div>
          </div>
        </div>

        <div class="card">
            <div class="card-header">
              <h4>Tabel Pinjaman Selesai</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>                                 
                    <tr>
                      <th>No</th>
                      <th>Nama barang</th>
                      <th>Tanggal Pinjaman</th>
                      <th>Tanggal Pengembalian</th>
                      <th>Status Pinjaman</th>
    
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($pS as $no=>$item)
                          <tr>
                              <td>{{$no+1}}</td>
                              <td>{{$item->barang->nama_barang}}</td>
                              <td>{{date("d/M/Y", strtotime($item->tgl_pinjaman));}}</td>
                              @if ($item->tgl_pengembalian == null)
                                  <td>-</td>
                              @else
                              <td>{{date("d/M/Y", strtotime($item->tgl_pengembalian));}}</td>
                              @endif
                              
                              @if ($item->status_pinjaman == 1)
                                  <td>Dipinjam</td>
                              @else
                                  <td>Dikembalikan</td>
                              @endif
                        
                             
                          </tr>
                      @endforeach
                  </tbody>
                </table>   
  
              </div>
            </div>
          </div>
      </div>
    </div>

  </div>
</section>

@foreach ($p as $item)
<form action="{{ url('pengembalian-barang/'. $item->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pengembalian Pinjaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <div class="form-group">
                      <label>Nama Peminjam</label>
                      <input type="text" class="form-control" value="{{$user->nama_depan}} {{$user->nama_belakang}}" required disabled>
                    </div>
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" value="{{$item->barang->nama_barang}}" required disabled>
                </div>
                <div class="form-group">
                  <label>Tanggal Pinjaman</label>
                  <input type="date" class="form-control" value="{{$item->tgl_pinjaman}}" required disabled>
                </div>
                <div class="form-group">
                  <label>Tanggal Pengembalian</label>
                  <input type="date" class="form-control" name="tgl_pengembalian" value="{{$item->tgl_pengembalian}}">
                </div>
                <input type="hidden" name="users_id" value="{{$user->id}}">
                <input type="hidden" name="barang_id" value="{{$item->id}}">
                <input type="hidden" name="status_pinjaman" value="2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Kembalikan</button>
          </div>
        </div>
      </div>
    </div>
  </form>        
@endforeach

@endsection