<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Buat akun baru.') }}
    </div>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input id="name" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="text" name="name" value="{{ old('name') }}" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="email" name="email" value="{{ old('email') }}" required />
        </div>

        

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>


<div class="mt-4">
    <input id="email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" placeholder="Email"
        type="email" name="email" value="{{ old('email', session('email')) }}" required autofocus />
</div>

<div class="form-group mb-3">
    <input id="email"
           type="email"
           name="email"
           value="{{ old('email', session('email')) }}"
           required autofocus
           class="form-control form-control-lg w-100 rounded"
           placeholder="Email">
  </div>


  <div class="mt-4">
    <input id="password" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" placeholder="Password"
        type="password" name="password" required />
</div>

<div class="form-group mb-3">
    <input id="password"
           type="password"
           name="password"
           required
           class="form-control form-control-lg w-100 rounded"
           placeholder="Password">
  </div>
