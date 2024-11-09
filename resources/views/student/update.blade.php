@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('student.update', $student) }}" type="update" url="{{ route('student.index') }}">
        <x-input type="text" name="nom" label="Nom complet" place="le nom complet" :value="$student->nom" />
        <x-input type="text" name="contact" place="contact" :value="$student->contact" />
        <x-input type="date" name="birthday" place="birthday" :value="$student->birthday" />
        <x-input type="date" name="register" label="Inscription" :value="$student->register" />
        <x-input type="date" name="payment" label="date payment" :value="$student->payment" :required="false" />
        <x-select name="tuteur_id" class="mt-3" label="liste des parents">
            @foreach ($tuteur as $row)
            <option @selected($row->id == $student->tuteur_id) value="{{ $row->id }}">{{ $row->nom }}</option>
            @endforeach
        </x-select>
    </x-form>
</div>
@endsection