@extends('layouts.app')
@section('content')
<x-table title="Liste des parents">
    <thead>
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>contact</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->nom }}</td>
            <td>{{ $row->contact }}</td>
            <td>{{ $row->created_at }}</td>
            <td>
                <x-button-edit href="{{ route('tuteur.edit', ['tuteur' => $row]) }}" />
                <x-button-delete url="{{ url('tuteur/'.$row->id) }}" />
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table>

<x-modal title="Formulaire de nouveau parent">
    <x-form route="{{ route('tuteur.store') }}">
        <x-input type="text" name="nom" label="Nom complet" place="le nom complet" />
        <x-input type="text" name="contact" place="contact" />
    </x-form>
</x-modal>
@endsection