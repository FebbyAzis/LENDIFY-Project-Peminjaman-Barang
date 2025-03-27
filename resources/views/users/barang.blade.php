@extends('layout.app')
@section('content')  
<section class="section">
<div class="section-header">
    <h1>Barang</h1>
    <div class="section-header-breadcrumb">
  
      <div class="breadcrumb-item active"><a href="{{url('/dashboard-users')}}">Dashboard</a></div>
      
      <div class="breadcrumb-item">Barang</div>
    </div>
  </div>
  @if (session('Success'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('Success') }} <a href="{{url('/pinjaman')}}"><b>Lihat Pinjaman</b></a>.
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

    @if (session('Successss'))
  <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <strong>Success!</strong> {{ session('Successss') }}.
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
              <h2 class="section-title">Data Barang</h2>
              <p class="section-lead">
                Anda dapat meminjam barang pada halaman ini dengan mengklik tombol pinjam pada tabel dibawah ini.
              </p>
          </div>
       
         
      
      </div>
  

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Barang</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>                                 
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Kode Barang</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($b as $no=>$item)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{ $item['nama_barang'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>{{ $item['kode_barang'] }}</td>
                            <td>Stok barang: {{$item['stok']}}<br>
                              Stok dipinjam: {{$item['total_pinjaman']}}<br>
                              Stok tersedia: {{$item['stok_tersisa']}}</td>
                              @if ($item['stok_tersisa'] == 0)
                                  <td>Tidak Tersedia</td>
                              @else
                                  <td>Tersedia</td>
                              @endif
                       
                            
                            <td>
                                @if ($item['stok_tersisa'] == 0)
                                <button class="btn btn-sm btn-secondary"  data-toggle="modal" data-target="#exampleModal2{{$item['id']}}" disabled>
                                    <i class="fas fa-hand"> Pinjam</i>
                                </button>
                                @else
                                <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModal2{{$item['id']}}">
                                    <i class="fas fa-hand"> Pinjam</i>
                                </button>
                                @endif
                               
                            </td>
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

  @foreach ($b as $item)
  <form action="{{ url('buat-pinjaman') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal2{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Pinjaman</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" value="{{$user->nama_depan}} {{$user->nama_belakang}}" required disabled>
                      </div>
                      <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="{{$item['nama_barang']}}" required disabled>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Pinjaman</label>
                    <input type="number" class="form-control" value="1" name="jumlah_pinjaman" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pinjaman</label>
                    <input type="date" class="form-control" name="tgl_pinjaman" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tgl_pengembalian">
                  </div>
                  <input type="hidden" name="users_id" value="{{$user->id}}">
                  <input type="hidden" name="barang_id" value="{{$item['id']}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Pinjam</button>
            </div>
          </div>
        </div>
      </div>
    </form>        
  @endforeach

@endsection