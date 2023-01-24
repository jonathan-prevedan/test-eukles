<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Materiel;
use App\Models\Client;
use App\Models\Lien;



class MaterielController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   
    public function index(){
        return view('materiel_view');
    }

    public function create(){
        return view('materiel_create');
    }

    public function insert(Request $request) {
        // Form validation
        $this->validate($request, [
            'materiel_name' => 'required',
            'materiel_description' => 'required',
            'materiel_prix' => 'required|min:0'
        ]);

        $id_materiel = Materiel::create([
            'nom' => $request->post('materiel_name'),
            'description' => $request->post('materiel_description'),
            'prix' => $request->post('materiel_prix'),
        ])->id;
        if(!is_int($id_materiel)){
            return false;
        }
        return back()->with('success', (isset($lien) ? 'Matériel affiliez correctement au client' : 'Matériel bien crée'));
    }
}
