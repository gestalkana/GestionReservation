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

        .login-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.25);
            color: #e0d8f7;
            animation: fadeIn 0.8s ease-in-out;
        }

        .login-card h2 {
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

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #b49bff;
            opacity: 0.7;
        }

        input:focus {
            border-color: #cbb3ff;
            box-shadow: 0 0 12px #b49bff;
            background: rgba(255, 255, 255, 0.15);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #d8cfff;
        }

        .remember-me input {
            margin-right: 0.5rem;
            accent-color: #b49bff;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .actions a {
            color: #d8cfff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .actions a:hover {
            color: #fff;
        }

        .btn-login {
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

        .btn-login:hover {
            background: linear-gradient(90deg, #cbb3ff, #a390d4);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="login-card">
        <h2>Connexion</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="exemple@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="********" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <!-- Actions -->
            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn-login">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
