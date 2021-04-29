<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function actionProject($id)
    {
        $project = DB::table('project')->where('id', '=', $id)->first();
        $tache = DB::table('tache')->where('project_id', '=', $id)->get();
        return view('detail', ['projects' => $project, 'taches' => json_encode($tache)]);
    }

    public function allTaches($id)
    {
        $tache = DB::table('tache')->where('project_id', '=', $id)->get();
        return json_encode($tache);
    }

    public function createTache(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('tache')->insert([
                'id' => $request['id'],
                'libelle' => $request['libelle'],
                'description' => $request['description'],
                'couche' => $request['description'],
                'date_debut' => $request['date_debut'],
                'date_fin' => $request['date_fin'],
                'status' => "En cour",
                'language' => $request['language'],
                'project_id' => $request['id_project'],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            return $e;
        }
        return back();
    }
}
