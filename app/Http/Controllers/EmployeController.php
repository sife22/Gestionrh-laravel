<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeController extends Controller
{
    // ============== afficher tout les employes ================
    public function index(Request $request){
        $employes = Employe::all();
        return view('accueil')->with(['employes' => $employes]);
    }
    // ==========================================================


    // ============= page d'ajoute d'un employe ===================
    public function create(){
        return view('creation');
    }
    // =============================================

    // ============= page d'modifier un employe ===================
    public function edit($id){
        $employe = Employe::find($id);
        return view('modification')->with('employe', $employe);
    }
    // =============================================

    // ============= page détails d'un employe ===================
    public function show($id){
        $employe = Employe::find($id);
        return view('details')->with('employe', $employe);
    }
    // =============================================

    // ============= page attestation d'un employe ===================
    public function attestation($id){
        $employe = Employe::find($id);
        return view('attestation')->with(['employe'=> $employe]);
    }
    // =============================================

    // ============= ajouter un employe =====================
    public function storeData(Request $request){

        $validateData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tel' => 'required|min:8',
            'adresse' => 'required|string',
            'date_naissance' => 'required',
            'poste' => 'required|string',
            'salaire' => 'required',
        ]);

        if($validateData){
            $employe = new Employe();
            $employe->numero_employe = rand(100, 1000);
            $employe->nom = $validateData['nom'];
            $employe->prenom = $validateData['prenom'];
            $employe->tel = $validateData['tel'];
            $employe->adresse = $validateData['adresse'];
            $employe->date_naissance = $validateData['date_naissance'];
            $employe->date_embauche = date('Y-m-d');
            $employe->poste = $validateData['poste'];
            $employe->salaire = $validateData['salaire'];
            $employe->save();
            return redirect('/accueil');
        }else{
            return redirect()->back()->withErrors($validateData)->withInput();
        }        
    }
    // =========================================================

    // ============= modifier un employe =====================
    public function updateData(Request $request, $id){
        $employe = Employe::find($id);
        $validateData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tel' => 'required|min:8',
            'adresse' => 'required|string',
            'date_naissance' => 'required',
            'poste' => 'required|string',
            'salaire' => 'required',
        ]);

        if($validateData){
            // $employe = new Employe();
            // Récuperer la valeur de numero employe;
            // $old_numero_employe = $employe->numero_employe;
            // Recuperer la valeur date embauche;
            // $old_date_embauche = $employe->date_embauche;
            
            $employe->numero_employe = $employe->numero_employe;
            $employe->date_embauche = $employe->date_embauche;
            $employe->nom = $validateData['nom'];
            $employe->prenom = $validateData['prenom'];
            $employe->tel = $validateData['tel'];
            $employe->adresse = $validateData['adresse'];
            $employe->date_naissance = $validateData['date_naissance'];
            $employe->poste = $validateData['poste'];
            $employe->salaire = $validateData['salaire'];
            $employe->save();
            return redirect('/accueil');
        }else{
            return redirect()->back()->withErrors($validateData)->withInput();
        }        
    }
    // =========================================================
    

    // ========== Supprimer un Stagiaire ==================
    public function delete($id){
        $employe = Employe::find($id);
        $employe->delete();
        return redirect('/accueil');
    }
    // ===================================================
}
