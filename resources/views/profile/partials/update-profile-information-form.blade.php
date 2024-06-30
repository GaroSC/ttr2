<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Información del Perfil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Actualiza la información de tu perfil y tu dirección de correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- ID IPN -->
        <div>
            <x-input-label for="id_ipn" :value="__('ID IPN')" />
            <x-text-input id="id_ipn" name="id_ipn" type="text" class="mt-1 block w-full" :value="old('id_ipn', $user->id_ipn)" required autofocus autocomplete="id_ipn" />
            <x-input-error class="mt-2" :messages="$errors->get('id_ipn')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Teléfono')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Tu dirección de correo electrónico no está verificada. Por favor, revisa tu bandeja de entrada para encontrar el enlace de verificación.

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Da click aquí para reenviar el correo de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Un nuevo enlace de verificación ha sido enviado a tu dirección de correo electrónico.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Photo -->
        <div>
            <x-input-label for="photo" :value="__('Foto')" />
            {{ __('Photo must be in JPG, JPEG, PNG format.') }}
            <input type="file" id="photo" name="photo" class="form-input-file" accept="image/*" />
            <br><br>
            @if ($user->photo)
                <x-input-label for="photo" :value="__('Current Photo')" class="text-center" />
                <div style="display: flex; justify-content:center">
                    <img src="{{ asset('storage/' . $user->photo) }}" class="img" width="200" height="100" />
                </div>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Guardar</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 4000)"
                    class="text-sm text-gray-600"
                >Guardado.</p>
            @endif
        </div>
    </form>
</section>
