<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="input-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full email-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 input-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full password-input" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 login-btn">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <style>
        /* Fade-in effect for the form */
        .login-form {
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Bounce effect on input fields */
        .email-input, .password-input {
            animation: bounceIn 0.5s ease-in-out;
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-30px);
                opacity: 0;
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Hover effect for the "Log in" button */
        .login-btn {
            transition: transform 0.3s ease-in-out;
        }

        .login-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Input field focus effect */
        .email-input:focus, .password-input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        /* Remember Me checkbox focus effect */
        #remember_me:focus {
            box-shadow: 0 0 3px rgba(29, 78, 216, 0.5);
            outline: none;
        }
    </style>
</x-guest-layout>
