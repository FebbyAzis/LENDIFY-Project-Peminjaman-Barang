@extends('layout.app')
@section('content')  
<section class="section">
<div class="section-header">
    <h1>Barang</h1>
    <div class="section-header-breadcrumb">
  
      <div class="breadcrumb-item active"><a href="{{url('/dashboard-admin')}}">Dashboard</a></div>
      
      <div class="breadcrumb-item">Barang</div>
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
                Anda dapat mengelola data barang pada halaman ini.
              </p>
          </div>
       
         <div class="col-sm-3 mt-3 text-right">
          <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i>&nbsp; Tambah Barang
          </button>
      </div>
      
      </div>
  

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Data</h4>
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
                               
                            <a href="{{url('detail-barang/'. $item['id'])}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat</a>
                              <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModal1{{$item['id']}}">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <button class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#exampleModal2{{$item['id']}}">
                                    <i class="fas fa-trash"> Hapus</i>
                                </button>
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

<form action="{{ url('tambah-barang') }}" method="POST">
  @csrf
  @method('POST')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" class="form-control" name="kategori" required>
                </div>
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" name="kode_barang" required>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="text" class="form-control" name="stok" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  @foreach ($b as $item)
  <form action="{{ url('edit-barang/'. $item['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="exampleModal1{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="{{$item['nama_barang']}}" required>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="{{$item['kategori']}}" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" name="kode_barang" value="{{$item['kode_barang']}}" required>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" value="{{$item['stok']}}" required>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  @endforeach

  @foreach ($b as $item)
  <form action="{{ url('hapus-barang/'. $item['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="exampleModal2{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus barang <b>{{$item['nama_barang']}}</b>? </p>
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
            </div>
          </div>
        </div>
      </div>
    </form>        
  @endforeach

@endsection