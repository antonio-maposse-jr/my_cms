<?php

namespace App\Http\Controllers;

use App\Http\Livewire\PremiumDocument;
use App\Models\PremiumDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PremiumDocumentsController extends AppBaseController
{

    public function index()
    {
        return view('premium_document.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('premium_document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $premiumDocument = new PremiumDocuments();
        $premiumDocument->name = $request->name;
        $premiumDocument->type = $request->type;
        $premiumDocument->url = $request->url;
        $premiumDocument->iframe = $request->iframe;
        $premiumDocument->created_by = Auth::user()->id;
        $premiumDocument->lang_id = $request->lang_id;

        $premiumDocument->save();
        Flash::success(__('Document created successfully'));

        return redirect(route('premium-documents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PremiumDocuments  $premiumDocuments
     * @return \Illuminate\Http\Response
     */
    public function show(PremiumDocuments $premiumDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PremiumDocuments  $premiumDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit(PremiumDocuments $premiumDocument)
    {

        return view('premium_document.edit', compact('premiumDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PremiumDocuments  $premiumDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PremiumDocuments $premiumDocument)
    {

        $premiumDocument->name = $request->name;
        $premiumDocument->type = $request->type;
        $premiumDocument->url = $request->url;
        $premiumDocument->iframe = $request->iframe;
        $premiumDocument->created_by = Auth::user()->id;
        $premiumDocument->lang_id = $request->lang_id;

        $premiumDocument->save();
        Flash::success(__('Document updated successfully'));

        return redirect(route('premium-documents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PremiumDocuments  $premiumDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy(PremiumDocuments $premiumDocument)
    {
        $premiumDocument->delete();
        return $this->sendSuccess('Document deleted successfully.');
    }
}
