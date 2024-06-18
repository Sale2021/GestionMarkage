@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('payment.update', $payment) }}" type="update" url="{{ route('payment.index') }}">
        <x-select name="student_id" class="mt-3" label="Etudiant">
            @foreach ($student as $row)
            <option @selected($row->id == $payment->student_id) value="{{ $row->id }}">{{ $row->matricule }} - {{
                $row->nom }}</option>
            @endforeach
        </x-select>
        <x-select name="mois" class="mt-3" label="Temps (Mois)">
            @for ($i = 1; $i < 13; $i++) <option @selected($i==$payment->mois) value="{{ $i }}">{{ $i }} mois</option>
                @endfor

        </x-select>
        <x-input type="number" name="montant" :value="$payment->montant" label="Montant payé en CFA"
            place="le montant" />
    </x-form>
</div>
@endsection