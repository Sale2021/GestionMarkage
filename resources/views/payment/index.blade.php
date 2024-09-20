@extends('layouts.app')
@section('content')
<x-table title="Liste des payment">
    <thead>
        <tr>
            <th>ID</th>
            <th>matricule</th>
            <th>etudiant</th>
            <th>durée</th>
            <th>montant</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->student->matricule }}</td>
            <td>{{ $row->student->nom }}</td>
            <td>{{ $row->mois }} mois</td>
            <td>{{ $row->montant_format }}</td>
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
        <x-select name="student_id" class="mt-3" label="Etudiant">
            @foreach ($student as $row)
            <option value="{{ $row->id }}">{{ $row->matricule }} - {{ $row->nom }}</option>
            @endforeach
        </x-select>
        <x-select name="mois" class="mt-3" label="Temps (Mois)">
            @for ($i = 1; $i < 13; $i++) <option value="{{ $i }}">{{ $i }} mois</option>
                @endfor

        </x-select>
        <x-input type="number" name="montant" label="Montant payé en CFA" place="le montant" />
    </x-form>
</x-modal>
@endsection