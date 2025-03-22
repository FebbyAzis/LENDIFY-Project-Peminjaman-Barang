@extends('layout.app')
@section('content')  
<section class="section">
<div class="section-header">
    <h1>Profil</h1>
    <div class="section-header-breadcrumb">
  
      <div class="breadcrumb-item active"><a href="{{url('/dashboard-users')}}">Dashboard</a></div>
      
      <div class="breadcrumb-item">Profil</div>
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
      <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1" width="10%">
                
                <h3 class="mt-3 mb-2">{{$user->nama_depan}} {{$user->nama_belakang}}</h3>
                <strong>Username: </strong>{{$user->name}}<br>
                <strong>Email: </strong>{{$user->email}}<br>
                <strong>No Telepon: </strong>{{$user->no_tlp}}<br><br>
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal1{{$users}}">
                    <i class="fas fa-edit"> Edit Profil</i>
                </button>
            </center>
            {{-- <table class="table">
                <tr>
                    <th class="text-right">Username</th>
                    <td class="text-center">:</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>:</td>
                    <td>{{$user->no_tlp}}</td>
                </tr>
            </table> --}}
            </div>
        </div>
      </div>
    </div>

  </div>
  
</section>
<form action="{{ url('edit-profil/'. $users) }}" method="POST">
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