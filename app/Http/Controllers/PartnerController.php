<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index(){
        return view('partners.index', [
            'partners' => Partner::orderBy('par_position', 'asc')
            ->paginate()
        ]);
    }

    public function create(){
        return view('partners.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
    		'name' => 'required|max:30',
    		'website'  => 'required',
            'position' => 'numeric|required|min:1|max:99',
            'logo'  => 'required|image|mimes:jpeg,png|max:3000',
    	]);

        $partner = new Partner;

        $partner->par_name = $request->name;
        $partner->par_website = $request->website;
        $partner->par_position = $request->position;
        $partner->par_state = $request->state;

        if($request->hasFile("logo")){
            $partner->par_logo = $this->imageUpload($request, "logo", "images/partners/");
        }
 
        $partner->save();

        return redirect()->route('partners.edit', $partner);
    }

    public function edit(Partner $partner){
        return view('partners.edit', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner) 
    {
        
        $request->validate([
    		'name' => 'required|max:30',
    		'website'  => 'required|url',
            'position' => 'numeric|required|min:1|max:99',
            'logo'  => 'image|mimes:jpeg,png|max:3000',
    	]);

        $partnerUpdate = Partner::find($partner->id);

        $partnerUpdate->par_name = $request->name;
        $partnerUpdate->par_website = $request->website;
        $partnerUpdate->par_position = $request->position;
        $partnerUpdate->par_state = $request->state;

        if($request->hasFile("logo")){
            $partnerUpdate->par_logo = $this->imageUpload($request, "logo", "images/partners/");
        }
 
        $partnerUpdate->save();

        return redirect()->route('partners.edit', $partner);
    }

    public function destroy(Partner $partner) 
    {
        $partner->delete();
        return back();
    }

    /*
    * Función para subir imagenes al servidor.
    */
    public function imageUpload(Request $request, String $nameImage, String $route){

        $imagen = $request->file($nameImage);
        $nombreimagen = Str::uuid().".".$imagen->guessExtension();
        $ruta = public_path($route);

        copy($imagen->getRealPath(),$ruta.$nombreimagen);

        return $nombreimagen;             

    }
}
