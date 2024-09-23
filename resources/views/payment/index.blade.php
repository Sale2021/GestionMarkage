@extends('layouts.app')
@section('content')
<x-table title="Liste des payment">
    <thead>
        <tr>
            <th>ID</th>
            <th>reference</th>
            <th>payment</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->reference }}</td>
            <td>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>matricule</th>
                            <th>etudiant</th>
                            <th>durée</th>
                            <th>montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($row->students as $item)
                        <tr>
                            <td>{{ $item->matricule }}</td>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->pivot->quantity }} mois</td>
                            <td>{{ number_format($item->pivot->montant, 0, ',', ' ').' CFA' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td>{{ $row->created_at }}</td>
            <td>
                <a class="btn rounded-pill btn-icon btn-primary" href="{{ route('print',$row) }}">
                    <i class="bx bx-printer bx-xs me-1"></i>
                </a>
                <x-button-edit href="{{ route('payment.edit', ['payment' => $row]) }}" />
                <x-button-delete url="{{ url('payment/'.$row->id) }}" />
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table>

<x-modal title="Formulaire de nouveau payment">
    <x-form route="{{ route('payment.store') }}">
        <x-select-tag name="student_id[]" label="Les etudiants" multiple>
            @foreach ($student as $row)
            <option value="{{ $row->id }}">{{ $row->nom }}</option>
            @endforeach
        </x-select-tag>
        <x-select name="mois" class="mt-3" label="Temps (Mois)">
            @for ($i = 1; $i < 13; $i++) <option value="{{ $i }}">{{ $i }} mois</option>
                @endfor
        </x-select>
        <x-input type="number" name="remise" label="Remise" place="Remise" :required="false" />
    </x-form>
</x-modal>
@endsection