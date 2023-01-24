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


class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $matos = new Materiel();
        $data = $matos->dashboard();
        return view('dashboard', ['collection' => $data, 'searchbar' => true]);
    }


    public function totauxByClient()
    {
        $return = [];
        $clients = Client::all();
        foreach($clients as $client){
            $client->total = 0;
            $results = Materiel::select('materiel.prix')->join('lien', 'lien.materiel_id', 'materiel.id')->where('lien.client_id', $client->id)->get();
            foreach($results as $res){
                $client->total += $res->prix;
            }
            $return[$client->id] = $client->total;
        }
        return view ('dashboard_total', ['clients' => $clients, 'rentable' => array_search(max($return), $return)]);
    }


    public function createMaterielOnClient(){
        return view('dashboard_create', ['materiels' => Materiel::all(), 'clients' => Client::all()]);
    }

    public function assignMaterielOnClient(Request $request)
    {
        if(!empty($request->post('materiel')) && !empty($request->post('client'))){
            $lien = Lien::create([
                'materiel_id' => $request->post('materiel'),
                'client_id' => $request->post('client'),
                'type'      => 'Achat',
                'date_achat' => date('Y-m-d H:i:s')
            ]);
        }
        return back()->with('success','Affiliation effectue');
    }

    public function exercice(){

        $clients = Client::select('client.*','materiel.prix', 'materiel.id AS id_materiel', 'lien.id AS id_lien')
                ->join('lien', 'client.id', '=', 'lien.client_id')
                ->join('materiel', 'lien.materiel_id', '=', 'materiel.id')
                ->groupBy('client.id')
                ->havingRaw('COUNT(lien.materiel_id) > ?', [30])
                ->havingRaw('SUM(materiel.prix) > ?', [30000])
                ->get();

        foreach($clients as $client){
            $client->total = Materiel::find($client->id_materiel)->sum('prix');
            $client->total_materiel = Lien::find($client->id_lien)->count();
        }
        return view ('dashboard_exercice', ['items' => $clients]);
    }
}
