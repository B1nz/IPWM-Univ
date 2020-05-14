@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <h1>Welcome, {{ auth()->user()->name }}!</h1>

  @if(auth()->user()->role == 'admin')

    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Fakultas</h3>
            <p class="card-text">
              <h5>Jumlah Fakultas : {{$fakultas}}</h5>
            </p>
            <p class="card-text">Manage Fakultas.</p>
            <a href="{{ route('fakultas.index') }}" class="btn btn-primary">Start!</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Jurusan</h3>
            <p class="card-text">
              <h5>Jumlah Jurusan : {{$jurusan}}</h5>
            </p>
            <p class="card-text">Manage what Jurusan is available at the Fakultas.</p>
            <a href="{{ route('jurusan.index') }}" class="btn btn-primary">Start!</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Room</h3>
            <p class="card-text">
              <h5>Jumlah Ruangan : {{$ruangan}}</h5>
            </p>
            <p class="card-text">Manage what Room is used by each Jurusan.</p>
            <a href="{{ route('ruangan.index') }}" class="btn btn-primary">Start!</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Barang</h3>
            <p class="card-text">
              <h5>Jumlah Barang : {{$barang}}</h5>
            </p>
            <p class="card-text">Manage what Stuff is available at each Room.</p>
            <a href="{{ route('barang.index') }}" class="btn btn-primary">Start!</a>
          </div>
        </div>
      </div>
    </div>

  @endif

  @if(auth()->user()->role !='admin')
  
    <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Barang</h5>
            <p class="card-text">Manage what Stuff is available at each Room.</p>
            <a href="{{ route('staffbarang.index') }}" class="btn btn-primary">Start!</a>
          </div>
        </div>
      </div>

  @endif

  <div class="section-body">
  </div>

</section>
@endsection()