@props(['type'=>'create','url','route'])
@if($type === "update")
<h2 class="p-4 text-center">Formulaire de mise à jour</h2>
@endif
<form novalidate action="{{ $route }}" {{ $attributes->merge(['class' => 'needs-validation']) }} method="post">
    @csrf
    <div class="row">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
    @if($type === "update")
    @method('PATCH')
    @endif
    <div class="modal-footer mt-2 justify-content-center">
        @if($type === "update")
        <a href="{{ $url }}" {{ $attributes->merge(['role' => 'button'])
            }} {{
            $attributes->merge(['class' => 'btn btn-outline-danger'])
            }}>
            Retour
        </a>
        @else
        <button type="button" {{ $attributes->merge(['class'=>'btn btn-outline-danger']) }}
            data-bs-dismiss="modal">
            Fermer
        </button>
        @endif

        <button {{ $attributes->merge(['type'=>'submit']) }} {{ $attributes->merge(['class'=>'btn btn-primary'])
            }}>Valider</button>
    </div>
</form>