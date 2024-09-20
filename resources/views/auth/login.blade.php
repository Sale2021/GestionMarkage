<x-guest-layout>

    <!-- Logo -->
    <div class="app-brand justify-content-center">
        <span class="app-brand-text demo text-body fw-bolder text-uppercase">Centre SAAD IBNOUBAID </span>
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form id="formAuthentication" class="mb-3" method="POST" id="formAuthentication" class="mb-3"
        action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                @if (Route::has('password.request'))
                <label class="form-label" for="password">Mot de passe</label>
                <a href="{{ route('password.request') }}">
                    <small>Mot de passe oublié?</small>
                </a>
                @endif
            </div>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <label for="remember-me" class="form-check-label">
                    <input id="remember-me" type="checkbox" class="form-check-input" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Connexion</button>
        </div>
    </form>
</x-guest-layout>