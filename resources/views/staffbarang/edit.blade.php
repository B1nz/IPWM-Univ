@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('staffbarang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('staffbarang.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
              </div>
              <div class="form-group">
                <label>Ruangan</label>
                <select name="ruangan_id" class="form-control">
                  @foreach($lists as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" name="total" class="form-control" value="{{ $data->total }}">
              </div>
              <div class="form-group">
                <label>Rusak</label>
                <input type="number" name="broken" class="form-control" value="{{ $data->broken }}">
              </div>
              <div class="form-group">
                <input type="text" name="created_by" class="form-control" value="{{ $data->created_by }}" readonly hidden>
              </div>
              <div class="form-group">
                <input type="text" name="updated_by" class="form-control" value="{{ auth()->user()->name }}" readonly hidden>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()