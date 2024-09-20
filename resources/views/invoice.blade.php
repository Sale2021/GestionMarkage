<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Page CSS -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

</head>

<body>
    <script>
        (function () {
  window.print();
})();
    </script>
    <style>
        html,
        body {
            background: #fff !important;
            padding: 0;
            margin: 0;
        }

        body>* {
            display: none !important;
        }

        .invoice-print {
            display: block !important;
            font-size: 15px !important;
            width: 100%;
        }

        .invoice-print * {
            color: #697a8d !important;
        }

        .invoice-print svg {
            fill: #697a8d !important;
        }

        .invoice-print,
        .invoice-print * {
            visibility: visible !important;
            overflow: visible !important;
        }
    </style>
    <div class="container-fluid invoice-print">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="invoice-print">
                    <div class="d-flex justify-content-between flex-payment">
                        <div class="mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <span class="app-brand-text demo text-body fw-bold text-uppercase">Centre SAAD IBN
                                    OUBAID</span>
                            </div>
                            <span>Kalaban Coura</span> <br>
                            <span>TEL : +223 70 61 10 10 /71 31 83 15</span>
                        </div>
                        <div>
                            <h4>Facture N° {{ $payment->reference }}</h4>
                            <div class="mb-2">
                                <span class="me-1">Date :</span>
                                <span class="fw-medium">{{ $payment->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-6">
                            <div class=" p-sm-3 p-0">

                                <h6 class="pb-2">infos etudiant</h6>
                                <p class="mb-1">Nom: {{ $payment->student ? $payment->student->nom : "" }}</p>
                                <p class="mb-1">Matricule: {{ $payment->student ? $payment->student->matricule : ""
                                    }}</p>
                                <p class="mb-1">contact: {{ $payment->student ? $payment->student->contact : "" }}
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" p-sm-3 p-0">

                                <h6 class="pb-2">infos parent</h6>
                                <p class="mb-1">Nom: {{ $payment->student ? $payment->student->tuteur->nom : "" }}
                                </p>
                                <p class="mb-1">Contact: {{ $payment->student ? $payment->student->tuteur->contact :
                                    "" }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table bpayment-top m-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Prix unitaire</th>
                                    <th>Qte</th>
                                    <th>montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="text-nowrap">35 000CFA</td>
                                    <td>{{ $payment->mois }} mois</td>
                                    <td>
                                        <h6 class="mb-0"> {{ $payment->montant_format }} </h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="align-top px-4 py-5">
                                        <p class="mb-2">
                                            <span class="me-1 fw-medium">Fournisseur</span>
                                        </p>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-0">Total:</p>
                                    </td>
                                    <td class="">
                                        {{ number_format($payment->montant, 0, ',', '
                                        ') }} CFA
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- / Layout wrapper -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- endbuild -->
</body>

</html>