<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Http\Requests\StoreParentRequest;
use App\Http\Requests\UpdateParentRequest;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function show(Parent $parent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function edit(Parent $parent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParentRequest  $request
     * @param  \App\Models\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentRequest $request, Parent $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parent $parent)
    {
        //
    }
}
