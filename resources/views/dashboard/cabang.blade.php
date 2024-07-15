@extends('template.appadmin')
@section('main')
    <style>
        .card {
            transition: .5s;
        }

        .card:hover {
            transform: scale(1.03);
            transition: .5s;
            box-shadow: 9px 9px 5px 0 rgba(0, 0, 0, 0.03);
        }

    </style>
    {{-- <div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Ayodya Pala</h5>
            </div>
            
        </div>
    </div>
</div> --}}
    <div class="panel-header " style="background-image: linear-gradient(#7a74fc, #6C63FF);">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard </h2>
                    <h5 class="text-white op-7 mb-2">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
