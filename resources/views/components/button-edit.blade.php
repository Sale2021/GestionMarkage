{{-- @props(['row'])
@can('update', $row)
<a aria-label="Button" {{ $attributes->merge(['class' => 'btn btn-primary btn-icon']) }}>
    <i class="ti ti-edit"></i></a>
@endcan --}}

<a aria-label="Button" {{ $attributes->merge(['class' => 'btn rounded-pill btn-icon btn-primary']) }}>
    <span class="tf-icons bx bx-edit-alt"></span>
</a>