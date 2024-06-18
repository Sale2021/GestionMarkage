@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('tuteur.update', $tuteur) }}" type="update" url="{{ route('tuteur.index') }}">
        <x-input type="text" name="nom" label="Nom complet" place="le nom complet" :value="$tuteur->nom" />
        <x-input type="text" name="contact" place="contact" :value="$tuteur->contact" />
    </x-form>
</div>
@endsection