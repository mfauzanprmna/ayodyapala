@extends('template.appadmin')
@section('main')
    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Nilai Tari</h4>
                </div>
            </div>
            <div class="card-body kekanan">
                {{-- <ul class="nav nav-pills nav-secondary nav-pills-no-bd d-flex justify-content-center align-items-center mb-3"
                    id="pills-tab-without-border" role="tablist">
                    @foreach ($juris as $key => $juri)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }} }}" data-bs-target="{{ $juri->id }}" data-toggle="pill" href="#{{ $juri->id }}"
                            role="tab" aria-controls="pills-home-nobd" aria-selected="true">{{ $juri->name }}</a>
                        </li>
                    @endforeach
                </ul> --}}
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('nilai.create') }}" class="btn btn-md btn-success">Tambah Nilai Tari</a>
                    <div>
                        <a href="{{ route('nilai_export') }}">
                            <button type="button" class="btn btn-primary">
                                Export Excel
                            </button>
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import Excel
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    @include('nilai.tari.table')
                </div>
            </div>
        </div>
    </div>
@endsection
