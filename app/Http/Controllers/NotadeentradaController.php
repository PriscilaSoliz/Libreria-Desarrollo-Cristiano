<?php

namespace App\Http\Controllers;

use App\Models\notadeentrada;
use Illuminate\Http\Request;

class NotadeentradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notadeentrada = notadeentrada::get();
        return view('VistaNotadeEntrada.index',compact('notadeentrada'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistaNotadeEntrada.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(notadeentrada $notadeentrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notadeentrada $notadeentrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, notadeentrada $notadeentrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notadeentrada $notadeentrada)
    {
        //
    }
}