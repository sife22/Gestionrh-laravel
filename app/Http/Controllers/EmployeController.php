<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeController extends Controller
{

    public function connexion(){
        return view('connexion');
    }

    // ============== afficher tout les employes ================
    public function index(Request $request){
        $employes = Employe::all();
        $admin = User::find(session()->get('adminId'));
        return view('accueil')->with(['employes' => $employes, 'admin'=> $admin]);
    }
    // ==========================================================

    // ================= recherche ==========================
    public function findOne(Request $request){
        $numero_employe = $request->input('numero_employe');
        if($numero_employe === null){
            return redirect()->back();
        }else{
            $employes = Employe::all()->where('numero_employe', '=', $numero_employe);
            return view('findone')->with('employes', $employes);
        }
    }
    // =============================================================

    // ============== congé ===================
    public function conge($id){
        $employe = Employe::find($id);
        return view('conge')->with('employe', $employe);
    }
    // =====================================

    // ============== prendre congé ===================
    public function setConge(Request $request, $id){
        // $validateData = $request->validate([
        //     'duree'=>'required|integer'
        // ]);
        $duree = $request['duree'];
        if($duree){
            $employe = Employe::find($id);

            if($duree <= $employe->conge){
                if($request['non'] && !$request['oui']){
                    $employe->salaire = $employe->salaire - (100 * $duree);
                    $employe->conge = $employe->conge - $duree;
                    $employe->save();
                    session()->flash('succes', 'Votre opération a été effuctuer avec succes. -'.$duree. ' jours');
                    return redirect()->back();
                }elseif($request['oui'] && !$request['oui']){
                    if($request['justification']){
                        $employe->conge = $employe->conge - $duree;
                        $employe->save();
                        session()->flash('succes', 'Votre opération a été effuctuer avec succes. -'.$duree. ' jours');
                        return redirect()->back();
                    }else{
                        session()->flash('justification', 'Tu dois entrer la justification');
                        return redirect()->back();
                    }
                }elseif($request['non'] && $request['oui']){
                    session()->flash('lesdeux', 'Tu as un erreur sur la justification!');
                    return redirect()->back();
                }
                
                elseif(!$request['oui'] && !$request['non']){
                        session()->flash('required', 'Tu dois remplir tous les champs');
                        return redirect()->back();
                }
            }elseif($duree > $employe->conge){
                session()->flash('failled', 'Tu peux pas prendre un congé');
                return redirect()->back();
            }
            }
            else{
                echo 'hah';
                    session()->flash('required', 'Tu dois remplir les champs');
                    return redirect()->back();
            }
            
        }
        // =====================================


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
        $admin = User::find(session()->get('adminId'));
        return view('attestation')->with(['employe'=> $employe, 'admin'=>$admin]);
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
        ], [
            'tel.min'=>'le tel doit etre super à 8'
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
