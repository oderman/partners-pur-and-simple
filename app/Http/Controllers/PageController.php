<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index(){
        return view('pages.index', [
            'pages' => Page::latest()->paginate()
        ]);
    }

    public function create(Page $page){
        return view('pages.create', ['page' => $page]);
    }

    public function store(Request $request) 
    {
        $request->validate([
    		'name' => 'required|max:20',
    		'body'  => 'required'
    	]);

        $page = new Page;

        $page->pag_name = $request->name;
        $page->pag_url = Str::slug($request->name);
        $page->pag_body = $request->body;
        $page->pag_state = 1;
 
        $page->save();

        return redirect()->route('pages.edit', $page);
    }

    public function edit(Page $page){
        return view('pages.edit', ['page' => $page]);
    }

    public function update(Request $request, Page $page) 
    {
        
        $pageUpdate = Page::find($page->id);

        $pageUpdate->pag_name = $request->name;
        $pageUpdate->pag_url = Str::slug($request->name);
        $pageUpdate->pag_body = $request->body;
 
        $pageUpdate->save();

        return redirect()->route('pages.edit', $page);
    }

    public function destroy(Page $page) 
    {
        $page->delete();
        return back();
    }



    public function home(){

        $page = Page::where('id', '=', 1)->firstOrFail();

        $partners = Partner::where('par_state', '=', 1)
        ->orderBy('par_position', 'asc')
        ->get();

        return view('home', [
            'page' => $page,
            'partners' => $partners
        ]);
    }
    
}
