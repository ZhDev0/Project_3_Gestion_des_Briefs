<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index()
    {
        return view('gestion_promotions');
    }

    public function getPromotions()
    {
        $promotion = Promotion::paginate(5);
        return view('gestion_promotions', compact('promotion'));
    }

    public function addPromotion()
    {
        return view('add_promotion');
    }

    public function submitPromotion(Request $req)
    {
        $validateData = $req->validate([
            'nom_promotion' => 'required'
        ]);
        DB::table('promotions')->insert([
            'nom_promotion' => $req->nom_promotion
        ]);
        return back()->with('promotion_created', 'Promotion Has Been Created SuccessFully !!');
    }

    public function deletePromotion($id) {
        DB::table('promotions')->where('id', $id)->delete();
        return back()->with('promotion_deleted', 'Promotion Has Been Created SuccessFully !!');
    }
}
