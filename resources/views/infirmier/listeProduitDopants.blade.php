<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des laboratoires - Infirmier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">

                <!-- Titre -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Liste des laboratoires
                    </h3>
                </div>

                <!-- Tableau -->
                <div class="p-6">
                    @if ($produiDopants->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400 text-center">
                            Aucun laboratoire trouvé.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                            #
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                            Nom du laboratoire
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($labos as $index => $nom)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                            <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-3 font-medium text-gray-900 dark:text-gray-100">
                                                {{ $nom }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>


