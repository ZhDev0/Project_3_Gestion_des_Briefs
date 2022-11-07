<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BriefController extends Controller
{
    public function index() {
        return view('gestion_briefs');
    }

    public function getBriefs()
    {
        $briefs = Brief::paginate(5);
        return view('gestion_briefs', compact('briefs'));
    }

    public function addBrief()
    {
        return view('add_brief');
    }

    public function submitbrief(Request $req)
    {
        $validateData = $req->validate([
            'nom_du_brief' => 'required',
            'Date_heure_livraison' => 'required',
            'Date_heure_recuperation' => 'required',
        ]);
        DB::table('briefs')->insert([
            'nom_du_brief' => $req->nom_du_brief,
            'Date_heure_livraison' => $req->Date_heure_livraison,
            'Date_heure_recuperation' => $req->Date_heure_recuperation,
        ]);
        return back()->with('Brief_created', 'Brief Has Been Created SuccessFully !!');
    }

    public function deletePromotion($id) {
        DB::table('promotions')->where('id', $id)->delete();
        return back()->with('promotion_deleted', 'Promotion Has Been Created SuccessFully !!');
    }
}
