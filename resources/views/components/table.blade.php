@props(['title','addbtn' => true, 'btnname' => 'Nouveau'])
<div class="card">
    <div class="row mx-2">
        <div class="col">
            <h5 {{ $attributes->merge(['class' => 'card-header']) }}>{{ $title }}</h5>
        </div>
        <div class="col-auto">
            @if ($addbtn)
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                <i class='bx bx-plus-circle'></i> {{ $btnname }}
            </button>

            @endif
        </div>
    </div>

    <div {{ $attributes->merge(['class' => 'table-responsive text-nowrap']) }} >
        <table id="myTable" {{ $attributes->merge(['class' => 'table table-hover']) }}>
            {{ $slot }}
        </table>
    </div>
</div>