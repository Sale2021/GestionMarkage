@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('user.update', $user) }}" type="update" url="{{ route('user') }}">
        <x-input type="text" name="name" place="le nom d'utilisateur" :value="$user->name" />
        <x-input type="email" name="email" place="email de utilisateur" :value="$user->email" />
        @if (!Auth::user()->isAdmin())
        <x-select-tag name="categorie[]" label="liste des categories produits">
            @foreach ($categorie as $row)
            <option @selected($user->categories->contains('id',$row->id)) value="{{ $row->id }}">{{ $row->nom }}
            </option>
            @endforeach
        </x-select-tag>
        <x-select name="boutique_id" label="boutique">
            @foreach ($boutique as $row)
            <option @selected($row->id == $user->boutique_id) value="{{ $row->id }}">{{ $row->nom }}</option>
            @endforeach
        </x-select>
        @endif
    </x-form>
</div>
@endsection
