<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ApiDocController extends Controller
{
    /**
     * Affiche l'interface Swagger
     */
    public function index()
    {
        return view('api-docs.index');
    }

    /**
     * Renvoie le fichier JSON de documentation
     */
    public function json()
    {
        // Vérifier si le fichier existe dans le dossier storage
        $storagePath = storage_path('api-docs/GRON_API_Collection.json');
        $publicPath = public_path('GRON_API_Collection.json');
        
        // S'assurer que le fichier public est à jour
        if (File::exists($storagePath) && (!File::exists($publicPath) || filemtime($storagePath) > filemtime($publicPath))) {
            File::copy($storagePath, $publicPath);
        }
        
        // Utiliser le fichier public s'il existe, sinon le fichier storage
        $path = File::exists($publicPath) ? $publicPath : $storagePath;
        
        if (!File::exists($path)) {
            return response()->json(['error' => 'Documentation file not found'], 404);
        }
        
        // Lire le contenu du fichier JSON
        $content = File::get($path);
        
        // Renvoyer le contenu avec les en-têtes appropriés
        return response($content)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With')
            ->header('Cache-Control', 'no-store, max-age=0');
    }
}
