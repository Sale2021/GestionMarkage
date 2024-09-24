@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="chart success" class="rounded">
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total des etudiant</span>
                <h3 class="card-title mb-2">{{ $student }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                    </div>
                </div>
                <span>Total des parents</span>
                <h3 class="card-title text-nowrap mb-1">{{ $tuteur }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                    </div>
                </div>
                <span>Total des payment</span>
                <h3 class="card-title text-nowrap mb-1">{{ number_format($payment, 0, ',', ' ') }} CFA</h3>
            </div>
        </div>
    </div>

</div>
@endsection