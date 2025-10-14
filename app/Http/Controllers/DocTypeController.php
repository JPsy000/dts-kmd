<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentType;
use Illuminate\Support\Facades\Auth;

class DocTypeController extends Controller
{
    public function store(Request $request)
    {
        try {

            $addDocType = new DocumentType();

            $addDocType->document_type = $request->doc_type;
            $addDocType->added_by = Auth::user()->id;

            $addDocType->save();
            return redirect()->back()->with('message', "Successfully added Document Type!")->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to save details: ' . $e->getMessage())->with('icon', 'error');
        }
    }
}
