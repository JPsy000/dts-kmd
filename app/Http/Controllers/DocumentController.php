<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\DocumentType;
use App\Documents;
use App\Offices;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeQuery = Offices::all();
        $documentQuery = Documents::with('docType')->get();
        $doctypeQuery = DocumentType::all();
        return view('users.document', compact('documentQuery', 'doctypeQuery', 'officeQuery'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->user_id != null) {
                $addDocument = Documents::where('id', $request->user_id)->first();
                if (!$addDocument) {
                    return redirect()->back()->with('error', 'Document not found');
                }
                $message = 'Updated';
            } else {
                $addDocument = new Documents();
                $message = 'Added';
            }
            $addDocument->dms_no = $request->dms_no ?? 'DMS' . date('Ymd') . rand(1000, 9999);
            $addDocument->doctype_id = $request->doc_type;
            $addDocument->case_no = $request->case_no;
            $addDocument->location = $request->location;
            $addDocument->investigator = $request->investigator;
            $addDocument->approver = $request->approver;
            $addDocument->subject = $request->subject;
            $addDocument->office = Auth::user()->office_id;
            $addDocument->encoded_by = Auth::user()->id;

            $addDocument->save();
            return redirect()->back()->with('message', "Successfully $message details!")->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to save details: ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function destroy($user_id)
    {
        $documentDelete = Documents::where('id', $user_id)->firstOrFail();
        if ($documentDelete) {
            $documentDelete->delete();
            return response()->json(['status' => 'success', 'message' => 'Successfully deleted!'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }

    public function updateFile(Request $request, $id)
    {
        $post = Documents::findOrFail($id);

        $existingFiles = [];
        if ($post->file_upload) {
            $existingFiles = json_decode($post->file_upload, true) ?? [];
        }

        $newFiles = [];
        if ($request->hasFile('file_upload')) {
            foreach ($request->file('file_upload') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                try {
                    $file->move(public_path('uploads'), $filename);
                    $newFiles[] = $filename;
                } catch (\Exception $e) {
                    return redirect()->back()->with('message', 'Failed to update details: ' . $e->getMessage())->with('icon', 'error');
                }
            }
        }

        $allFiles = array_merge($existingFiles, $newFiles);
        $post->file_upload = json_encode($allFiles);
        $post->save();

        return redirect()->back()->with('message', "Successfully updated details!")->with('icon', 'success');
    }

    public function getDocument(Request $request)
    {
        $document = Documents::find($request->user_id);
        if ($document) {
            return response()->json(['status' => 'success', 'data' => $document], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Document not found'], 404);
        }
    }

    public function viewDocs($id)
    {
        $viewDocs = Documents::with('docType')->find($id);
        if ($viewDocs) {
            return view('users.view', compact('viewDocs'));
        } else {
            return redirect()->back()->with('message', 'Document not found')->with('icon', 'error');
        }
    }
}
