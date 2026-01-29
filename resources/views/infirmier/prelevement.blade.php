<title>Génération des prélèvements</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contrôle Anti-Dopage - Infirmier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-md rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 shadow-md rounded-r">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700">

                <div class="p-8 border-b border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.628.282a2 2 0 01-1.808 0l-.63-.282a6 6 0 00-3.86-.517l-2.387.477a2 2 0 00-1.022.547m0 0V19a2 2 0 002 2h10a2 2 0 002-2v-3.572M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            Génération automatique des prélèvements
                        </h3>
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Cette action sélectionnera aléatoirement 10% des triathlètes inscrits pour un contrôle.
                    </p>
                </div>

                <div class="p-8">
                    <form action="{{ route('infirmier.generatePrelevement') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="idT" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Sélectionner le Triathlon
                                </label>
                                <select name="idT" id="idT" required
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                                    <option value="" disabled selected>Choisir une compétition...</option>
                                    @foreach ($triathlons as $triathlon)
                                        <option value="{{ $triathlon->idT }}">
                                            {{ $triathlon->nomT }} ({{ \Carbon\Carbon::parse($triathlon->dateT)->format('d/m/Y') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="idLabo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Laboratoire d'analyse
                                </label>
                                <select name="idLabo" id="idLabo" required
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                                    <option value="" disabled selected>Choisir un laboratoire...</option>
                                    @foreach ($labos as $labo)
                                        <option value="{{ $labo->idLabo }}">
                                            {{ $labo->nomlabo }} - {{ $labo->adresseVille }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-100 dark:border-gray-700 flex justify-end">
                            <button type="submit"
                                onclick="return confirm('Êtes-vous sûr de vouloir lancer le tirage au sort de 10% des inscrits ?')"
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-bold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Générer les prélèvements
                            </button>
                        </div>
                    </form>
                </div>

                <div class="px-8 py-4 bg-gray-50 dark:bg-gray-900/30 text-xs text-gray-500 dark:text-gray-400 italic">
                    Note : Pour chaque triathlète tiré au sort, les lignes de mesures pour tous les produits dopants seront initialisées à vide.
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
