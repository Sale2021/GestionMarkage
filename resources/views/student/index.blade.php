@extends('layouts.app')
@section('content')
<x-table title="Liste des etudiants">
    <thead>
        <tr>
            <th>ID</th>
            <th>matricule</th>
            <th>parent</th>
            <th>nom</th>
            <th>naissance</th>
            <th>contact</th>
            <th>prochaine paiement</th>
            <th>Inscription</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->matricule }}</td>
            <td>{{ $row->tuteur->nom }} <br>{{ $row->tuteur->contact }}</td>
            <td>{{ $row->nom }}</td>
            <td>{{ $row->birthday }}</td>
            <td>{{ $row->contact }}</td>
            <td><span @class(['text-danger'=> now() >= $row->payment])>{{ $row->payment_format }}</span></td>
            <td>{{ $row->register }}</td>
            <td>{{ $row->created_at }}</td>
            <td>
                <x-button-edit href="{{ route('student.edit', ['student' => $row]) }}" />
                <x-button-delete url="{{ url('student/'.$row->id) }}" />
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table>

<x-modal title="Formulaire de nouveau etudiant">
    <x-form route="{{ route('student.store') }}">
        <x-input type="text" name="nom" label="Nom complet" place="le nom complet" />
        <x-input type="date" name="birthday" place="birthday" />
        <x-input type="text" name="contact" place="contact" />
        <x-input type="date" name="register" label="Inscription" />

        <x-select name="tuteur_id" class="mt-3" label="liste des parents">
            @foreach ($tuteur as $row)
            <option value="{{ $row->id }}">{{ $row->nom }}</option>
            @endforeach
        </x-select>
    </x-form>
</x-modal>
@endsection