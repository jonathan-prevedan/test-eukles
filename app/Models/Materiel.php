<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Materiel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'materiel';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description',
        'prix'
    ];


    public function dashboard()
    {
        return Materiel::select('client.nom AS client_nom', 'client.id AS id_client', 'materiel.nom AS materiel_nom', 'materiel.prix AS materiel_prix', 'lien.date_achat AS lien_date', 'lien.id')
        ->join('lien', 'lien.materiel_id','materiel.id')
        ->join('client', 'client_id','client.id')
        ->whereNull('materiel.deleted_at')
        ->whereNull('client.deleted_at')
        ->get();
    }
}
