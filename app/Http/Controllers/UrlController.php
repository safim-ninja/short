<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        while (Url::where('short', $rnd = Str::random(6))->first()) {}
        try {
            Url::create([
                'short' => $rnd,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => $request->url,
            ]);
            // Toastr::success('Short Link Created');
            Toastr::success('Short Link Created', ' ', ["positionClass" => "toast-top-right"]);
            return view('home', compact('rnd'));
        } catch (Exception $e) {
            Toastr::error($e->getMessage());
            return view('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function getUrl($url)
    {
        if($link = Url::where('short', $url)->first()){
            return redirect($link->url);
            // dd($link->url);
        }
        else {
            return 'not found';
            // dd('invalid short url');
        }
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
