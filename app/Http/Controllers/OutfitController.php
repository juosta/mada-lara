<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use Illuminate\Http\Request;
use App\Models\Master;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$outfits = Outfit::all();
        $dir = 'asc';
        $sort = 'type';

        if($request->sort_by && $request->dir)
        {
            if('type' == $request->sort_by && 'asc' == $request->dir)
            {
                $outfits = Outfit::orderBy('type')->paginate(15);
            }
            elseif('type' == $request->sort_by && 'desc' == $request->dir)
            {
                $outfits = Outfit::orderBy('type','desc')->paginate(15);
                $dir = 'desc';
            }
            elseif('size' == $request->sort_by && 'asc' == $request->dir)
            {
                $outfits = Outfit::orderBy('size')->paginate(15);
                $sort = 'size';
            }
            elseif('size' == $request->sort_by && 'desc' == $request->dir)
            {
                $outfits = Outfit::orderBy('size','desc')->paginate(15);
                $dir = 'desc';
                $sort = 'size';
            }
            else 
            {
                $outfits = Outfit::paginate(15);
            }
        }
        else 
        {
            $outfits = Outfit::paginate(15);
        }

        return view('outfit.index', ['outfits' => $outfits, 'dir' => $dir, 'sort' => $sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = Master::all();
        return view('outfit.create', ['masters' => $masters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outfit = new Outfit;
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()->route('outfit.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function show(Outfit $outfit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function edit(Outfit $outfit)
    {
        $masters = Master::all();
        return view('outfit.edit', ['outfit' => $outfit, 'masters' => $masters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outfit $outfit)
    {
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()->route('outfit.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()->route('outfit.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
