@props(['url' => ''])
@if ($url)
<button type="button" {{ $attributes->merge(['class' => 'btn btn-danger btn-icon']) }} onclick="restore('{{ $url }}')">
    <i class='bx bx-reset'></i>
</button>
@endif