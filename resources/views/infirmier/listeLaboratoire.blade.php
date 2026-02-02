<title>Liste des Laboratoires</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Portail Infirmier - Gestion des Laboratoires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Laboratoires Partenaires</h3>
                    <p class="text-gray-500 dark:text-gray-400">Sélectionnez un établissement pour gérer les prélèvements.</p>
                </div>
                <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md font-bold">
                    {{ $labos->count() }} Établissements
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <form method="get" action="{{ route('infirmier.listLaboratoireSearch') }}">
                    <select name="ville" id="ville_id">
                        <option disabled selected>Choisir une ville : </option>
                        @foreach ($villes as $ville)
                            <option value="{{ __($ville) }}">{{ __($ville) }}</option>
                        @endforeach
                    </select>
                    <button>Choisir !</button>
                </form>
            </div>

            @if ($labos->isEmpty() && $villes->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-12 text-center shadow-sm border border-dashed border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Aucun laboratoire répertorié.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php $nombre = 0 @endphp
                    @foreach ($labos as $nom)
                        <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden cursor-pointer transform hover:-translate-y-1"
                             onclick="window.location.href='{{ route('infirmier.infoLabo', ['nom_labo' => urlencode($nom)]) }}'">

                            <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-500 group-hover:bg-blue-400 transition-colors"></div>

                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center">
                                        <div class="p-3 bg-blue-50 dark:bg-blue-900/30 rounded-xl group-hover:bg-blue-500 transition-colors duration-300">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                {{ $nom }}
                                            </h4>
                                            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold mt-1">Laboratoire d'analyses</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-between text-sm">
                                    <span class="text-gray-500 dark:text-gray-400 font-medium italic">Accéder aux détails</span>
                                    <div class="flex items-center text-blue-600 dark:text-blue-400 font-bold group-hover:translate-x-2 transition-transform">
                                        Voir la fiche
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $nombre++ @endphp
                    @endforeach
                </div>

                <div class="mt-10 py-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 italic text-sm text-center">
                        Synthèse : {{ $nombre }} établissements disponibles dans le réseau.
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
