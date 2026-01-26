<x-guest-layout>
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">

        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">Connexion Infirmier</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                Accès à l’espace professionnel
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" value="Identifiant / Email" />
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    class="mt-1 block w-full"
                    placeholder="infirmier@hopital.fr"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    class="mt-1 block w-full"
                    placeholder="••••••••"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div >
                <select name="role" required class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 mt-1">
                    <option value="0">Laboratoire</option>
                    <option value="1">Infirmier</option>
                </select>
            </div>

            <div class="flex items-center justify-between mt-1">
                <label class="flex items-center text-sm">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    <span class="ml-2">Se souvenir de moi</span>
                </label>

                <a href="#" class="text-sm text-blue-600 hover:underline">
                    Aide
                </a>
            </div>

            <x-primary-button class="w-full justify-center mt-1">
                Se connecter
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
