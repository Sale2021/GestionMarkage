@extends('layouts.app')
@section('content')
<x-table title="Liste des utilisateurs">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>email</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>
            <td>
                <x-button-edit href="{{ route('user.edit', ['user' => $row]) }}" />
                <x-button-delete url="{{ url('user/'.$row->id) }}" />
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table>

<x-modal title="Formulaire de nouveaux utilisateur">
    <x-form route="{{ route('user.store') }}">
        <x-input type="text" name="name" place="le nom d'utilisateur" />
        <x-input type="email" name="email" place="email de utilisateur" />
        <x-input type="password" name="password" label="Mot de passe" place="votre mot de passe" />
        <x-input type="password" name="password_confirmation" label="Confirmation du mot de passe"
            place="confirmez votre mot de passe" />
    </x-form>
</x-modal>
@endsection