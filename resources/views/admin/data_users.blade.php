@extends('layout.app')
@section('content')  
<section class="section">
<div class="section-header">
    <h1>Users</h1>
    <div class="section-header-breadcrumb">
  
      <div class="breadcrumb-item active"><a href="{{url('/dashboard-admin')}}">Dashboard</a></div>
      
      <div class="breadcrumb-item">Users</div>
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
              <h2 class="section-title">Data Users</h2>
              <p class="section-lead">
                Anda dapat mengelola data users pada halaman ini.
              </p>
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
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user1 as $no=>$item)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{ $item['nama_depan'] }} {{ $item['nama_belakang'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['no_tlp'] }}</td>
                            @if ( $item->role == 1)
                                <td>Administrator</td> 
                            @else
                            <td>Users</td> 
                            @endif
                            <td>
                               
                            
                              <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModal1{{$item['id']}}">
                                    <i class="fas fa-edit"> Edit</i>
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

<form action="{{ url('edit-data-users/'. $users) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="exampleModal1{{$users}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" value="{{$user->nama_depan}}" required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" value="{{$user->nama_belakang}}" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_tlp" value="{{$user->no_tlp}}" required>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
@endsection