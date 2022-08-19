<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        return view('partners.index', [
            'partners' => Partner::latest()->paginate()
        ]);
    }

    public function destroy(Partner $partner) 
    {
        $partner->delete();
        return back();
    }
}
