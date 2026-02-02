<title>Liste des Prélèvements</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Portail Infirmier - Gestion des Prélèvements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- En-tête --}}
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Prélèvements effectués</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        Cliquez sur un prélèvement pour consulter le détail.
                    </p>
                </div>
                <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md font-bold">
                    {{ $prelevements->count() }} Prélèvements
                </div>
            </div>

            {{-- Form --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <form method="get" action="{{ route('infirmier.listPrelevementSearch') }}">
                    <select name="id_labo" id="lobo_id">
                        <option disabled selected>Choisir une ville : </option>
                        @foreach ($labos as $unLabo)
                            <option value="{{ __($unLabo->idLabo) }}">{{ __($unLabo->nomlabo) }}</option>
                        @endforeach
                    </select>

                    <select name="id_triathlon" id="triathlon_id">
                        <option disabled selected>Choisir un triathlon : </option>
                        @foreach ($triathlons as $unTriathlon)
                            <option value="{{ __($unTriathlon->idT) }}">{{ __($unTriathlon->nomT) }}</option>
                        @endforeach
                    </select>

                    <select name="id_triathlete" id="triathlete_id">
                        <option disabled selected>Choisir un triathlete : </option>
                        @foreach ($triathletes as $unTriathlete)
                            <option value="{{ __($unTriathlete->numLicence) }}">{{ __($unTriathlete->nom . " " . $unTriathlete->prenom) }}</option>
                        @endforeach
                    </select>

                    <button>Choisir !</button>
                </form>
            </div>

            @if ($prelevements->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-12 text-center shadow-sm border border-dashed border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Aucun prélèvement enregistré.
                    </p>
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Licence
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Laboratoire
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach ($prelevements as $p)
                                <tr
                                    class="hover:bg-blue-50 dark:hover:bg-gray-700 cursor-pointer transition"
                                    onclick="window.location='{{ route('infirmier.infoPrelevement', $p->idPrelevement) }}'">

                                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                        #{{ $p->idPrelevement }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        {{ $p->datePrelevement }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        {{ $p->numLicence }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-blue-600 dark:text-blue-400">
                                        {{ $p->nomLabo }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-10 py-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 italic text-sm text-center">
                        Synthèse : {{ $prelevements->count() }} prélèvements enregistrés.
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
