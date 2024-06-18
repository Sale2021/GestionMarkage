@props([
'url' => '',
'text' => 'Etes vous sur de vouloir supprimer cet element!',
'confirmButtonText' => 'Oui, Supprimer!',
'title' => 'Supprimer?'
])


<button type="button" {{ $attributes->merge(['class' => 'btn btn-danger btn-icon']) }}
    onclick="deleteConfirmation('{{ $url }}','{{ $text }}','{{ $confirmButtonText }}','{{ $title }}')"><span
        class='bx bx-trash'></span></button>
