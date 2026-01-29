<?php

namespace App\Http\Controllers;

use App\Models\Laboratoire;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log as Logger;
use Illuminate\Support\Facades\DB;
use App\Models\Triathlon;
use \App\Models\ProduitDopant;
use Carbon\Carbon;

class InfirmierController extends Controller
{
    public function dashboard(): View
    {
        return view('infirmier.dashboardInfirmier');
    }


    // Permet de recuperer la liste des laboratoires :
    public function listLaboratoire(Request $request): View | RedirectResponse {

        $user = $request->user();
        Logger::warning('User : ', ['user'=> $user]);

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $labos = Laboratoire::distinct()->pluck('nomlabo');
        return view('infirmier.listeLaboratoire', compact('labos'));
    }



    public function listProduitDopant(Request $request): View | RedirectResponse {

         $user = $request->user();

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $produitsDopants = ProduitDopant::distinct()->pluck('libelleProduit');;

        return view('infirmier.listeProduitDopants', compact('produitsDopants'));
    }


    public function infoLaboratoire(Request $request, string $nom_labo): View | RedirectResponse {
        $user = $request->user();

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $unLabo = Laboratoire::select('idLabo', 'nomlabo','adresseRue','adresseCP')->where('nomlabo', $nom_labo)->get();
        Logger::warning('Laboratoire : ', ['labo'=> $unLabo]);

        if ($unLabo && $unLabo->count() > 0)
            return view('infirmier.infoLabo', compact('unLabo'));
        else
            return abort(404, "Laboratoire $nom_labo non trouver !");

    }


    public function viewPrelevement(Request $request): View | RedirectResponse {

         $user = $request->user();

         if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
         }

        // Récupération des laboratoires pour la liste déroulante
        $labos = Laboratoire::all();

        // Récupération de tous les triathlons pour le filtrage et la génération
        $triathlons = Triathlon::all();

        return view('infirmier.prelevement', compact('labos', 'triathlons'));
    }



    public function generatePrelevement(Request $request)
    {
        $idT = $request->input('idT'); // ID du Triathlon
        $idLabo = $request->input('idLabo'); // ID du Laboratoire choisi

        Logger::info("Idt : ", ['idT' => $idT]);
        Logger::info("idLabo : ", ['idLabo' => $idLabo]);

        try {
            DB::transaction(function () use ($idT, $idLabo) {

                // 1. Tirage au sort de 10% des inscrits
                // On récupère les numéros de licence aléatoirement
                $inscrits = DB::table('Inscription')
                    ->where('idT', "=", $idT)
                    ->inRandomOrder()
                    ->limit(DB::table('Inscription')->where('idT', '=', $idT)->count() * 0.10 ?? 1)
                    ->pluck('numLicence');

                foreach ($inscrits as $licence) {
                    // 2. Création du prélèvement
                    // On simule l'auto-incrément si la base n'en a pas
                    $newId = DB::table('Prelevement')->max('idPrelevement') + 1;

                    DB::table('Prelevement')->insert([
                        'idPrelevement' => $newId,
                        'datePrelevement' => Carbon::now()->format('Y-m-d'), // Date du jour
                        'numLicence' => $licence,
                        'idLabo' => $idLabo
                    ]);

                    // 3. Initialisation des mesures pour chaque produit dopant
                    $produits = DB::table('ProduitDopant')->pluck('id');

                    foreach ($produits as $codeProduit) {
                        DB::table('comprendre')->insert([
                            'codeProduit' => $codeProduit,
                            'idPrelevement' => $newId,
                            'mesure' => null // Valeur nulle en attente du labo
                        ]);
                    }
                }
            }, 1);

            return back()->with('success', 'Prélèvements générés avec succès !');

        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la génération : ' . $e->getMessage());
        }
    }

}
