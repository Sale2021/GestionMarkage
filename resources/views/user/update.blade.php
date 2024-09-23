@extends('layouts.app')
@section('content')
<div class="card">
    <x-form route="{{ route('user.update', $user) }}" type="update" url="{{ route('user.index') }}">
        <x-input type="text" name="name" place="le nom d'utilisateur" :value="$user->name" />
        <x-input type="email" name="email" place="email de utilisateur" :value="$user->email" />
    </x-form>
</div>
@endsection