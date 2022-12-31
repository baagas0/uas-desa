@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="card-group">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg btn-info">
                            <i class="ti-wallet text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Karyawan

                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ $countEmployees }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-success">
                            <i class="ti-shopping-cart text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Pengguna

                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ $countUsers }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <!-- Column -->


    </div>
@endsection
