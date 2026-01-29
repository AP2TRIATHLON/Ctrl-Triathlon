<title>Info du laboratoire - {{ __($unLabo[0]->nomlabo) }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information Laboratoire - Infirmier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ __('Information sur se Laboratoire :') }}</h1>
                </div>


                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Identifiant :
                    {{ __($unLabo[0]->idLabo) }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Nom :
                    {{ __($unLabo[0]->nomlabo) }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Adresse :
                    {{ __($unLabo[0]->adresseRue) }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Code postal :
                    {{ __($unLabo[0]->adresseCP) }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Ville :
                    {{ __($unLabo[0]->adresseVille) }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
