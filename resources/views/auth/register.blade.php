<x-guest-layout>
    <style>
        body {
            background: radial-gradient(circle at center, #4b367c 0%, #2a1d47 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e0d8f7;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
            animation: fadeIn 0.8s ease-in-out;
        }

        .register-card h2 {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #f8f9fa;
            text-shadow: 0 0 8px #8a78b0;
        }

        label {
            font-weight: 600;
            color: #d8cfff;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.25rem;
            border-radius: 8px;
            border: 1px solid #b49bff;
            background: rgba(255, 255, 255, 0.1);
            color: #e0d8f7;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: #b49bff;
            opacity: 0.7;
        }

        input:focus {
            border-color: #cbb3ff;
            box-shadow: 0 0 12px #b49bff;
            background: rgba(255, 255, 255, 0.15);
        }

        .link-login {
            color: #d8cfff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .link-login:hover {
            color: #ffffff;
        }

        .btn-register {
            background: linear-gradient(90deg, #b49bff, #8a78b0);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            color: #4b367c;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(180, 155, 255, 0.4);
        }

        .btn-register:hover {
            background: linear-gradient(90deg, #cbb3ff, #a390d4);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="register-card">
        <h2>Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nom complet')" />
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Votre nom complet" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Adresse email')" />
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="exemple@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="********" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="link-login" href="{{ route('login') }}">
                    {{ __('Déjà inscrit ? Se connecter') }}
                </a>

                <button type="submit" class="btn-register">
                    {{ __('S\'inscrire') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
