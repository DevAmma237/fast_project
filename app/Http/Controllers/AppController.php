<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;

class AppController extends Controller
{
    public function changeTheme()
    {
        $user = User::find(Auth::user()->id);
        $user->theme = Auth::user()->theme == 0 ? 1 : 0;
        $user->save();
        return 1;
    }

    public function createProject(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('project')->insert([
                'id' => $request['id'],
                'libelle' => $request['name'],
                'description' => $request['description'],
                'date_debut' => $request['date_debut'],
                'date_fin' => $request['date_fin'],
                'status' => "En cour",
                'type_de_projet' => $request['type'],
                'user_id' => Auth::user()->id,
            ]);

            DB::commit();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function getProfile()
    {
        return view('profile');
    }

    public function setName(Request $request)
    {
        return back();
    }
}
