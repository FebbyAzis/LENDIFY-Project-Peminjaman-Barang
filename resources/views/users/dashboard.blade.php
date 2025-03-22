@extends('layout.app')
@section('content')  
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pinjaman Aktif</h4>
            </div>
            <div class="card-body">
              {{$pinjamanAktif}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pinjaman Selesai</h4>
            </div>
            <div class="card-body">
              {{$pinjamanSelesai}}
            </div>
          </div>
        </div>
      </div>
                     
    </div>

  </section>
@endsection