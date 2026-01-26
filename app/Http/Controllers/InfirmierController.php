<?php

namespace App\Http\Controllers;

use App\Models\Laboratoire;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log as Logger;

class InfirmierController extends Controller
{
    public function dashboard(): View
    {
        return view('infirmier.dashboardInfirmier');
    }


    public function listLaboratoire(Request $request): View | RedirectResponse {

        $user = $request->user();
        Logger::warning('User : ', ['user'=> $user]);

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $labos = Laboratoire::distinct()->pluck('nom');
        return view('infirmier.listeLaboratoire', compact('labos')); 
    }



    public function listProduitDopant(Request $request): View | RedirectResponse {

         $user = $request->user();

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $labos = Laboratoire::distinct()->pluck('nom');
        return view('infirmier.listeProduitDopants', compact('labos')); 
    }


    public function infoLaboratoire(Request $request, string $nom_labo): View | RedirectResponse {
        $user = $request->user();

        if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
        }

        $unLabo = Laboratoire::select('nom', 'id')->where('nom', $nom_labo)->get();
        Logger::warning('Laboratoire : ', ['labo'=> $unLabo]);

        if ($unLabo)
            return view('infirmier.infoLabo', compact('unLabo'));
        else 
            return abort(404, "Laboratoire $nom_labo non trouver !");

    }



    public function listProduitDopants(Request $request): View | RedirectResponse {

         $user = $request->user();

         if (!$user || !$user->role_id == 2) {
            return redirect()->route('dashboard');
         }

        return view('infirmier.listeProduitDopants');
    }

}
