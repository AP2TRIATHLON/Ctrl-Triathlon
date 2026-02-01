<title>Détail du Prélèvement - {{ __($prelevement->idPrelevement) }}</title>

<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Portail Infirmier - Détail du Prélèvement') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

                {{-- EN-TÊTE --}}
                <div class="flex justify-between items-end">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Prélèvement #{{ $prelevement->idPrelevement }}
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            Informations générales et résultats d’analyse
                        </p>
                    </div>

                    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md font-bold">
                        {{ $prelevement->datePrelevement }}
                    </div>
                </div>

                {{-- INFOS GÉNÉRALES --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                            Informations du prélèvement
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">
                                    Numéro de licence
                                </p>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">
                                    {{ $prelevement->numLicence }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">
                                    Laboratoire
                                </p>
                                <p class="text-lg font-bold text-blue-600 dark:text-blue-400">
                                    {{ $labo[0]->nomlabo ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">
                                    Date du prélèvement
                                </p>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">
                                    {{ $prelevement->datePrelevement }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RÉSULTATS / MESURES --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">
                            Résultats des analyses
                        </h4>

                        @if ($mesures->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400 italic">
                                Aucune mesure enregistrée.
                            </p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-900">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                Produit dopant
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                Mesure
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                Statut
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                        @foreach ($mesures as $m)
                                            <tr>
                                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                                    {{ $m->nomProduit }}
                                                </td>

                                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                                    {{ $m->mesure ?? '—' }}
                                                </td>

                                                <td class="px-6 py-4">
                                                    @if ($m->mesure === null)
                                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                                            En attente
                                                        </span>
                                                    @else
                                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                                            Renseigné
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ACTIONS --}}
                <div class="flex justify-end">
                    <a href="{{ route('infirmier.listPrelevement') }}"
                    class="inline-flex items-center px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg font-bold hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        ← Retour à la liste
                    </a>
                </div>

            </div>
        </div>

</x-app-layout>
