@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('payment.update', $payment) }}" type="update" url="{{ route('payment.index') }}">
        <x-select-tag name="student_id[]" label="Les etudiants" multiple>
            @foreach ($student as $row)
            <option @selected($payment->students->contains('id',$row->id)) value="{{ $row->id }}">{{ $row->nom }}
            </option>
            @endforeach
        </x-select-tag>

        <x-select name="mois" class="mt-3" label="Temps (Mois)">
            @for ($i = 1; $i < 13; $i++) <option @selected($i==$payment->students->first()->pivot->quantity) value="{{
                $i }}">{{ $i }} mois</option>
                @endfor

        </x-select>
        <x-input type="number" :disabled="true" :value="$payment->totaux" label="Total payé en CFA"
            place="le montant" />
    </x-form>
</div>
@endsection