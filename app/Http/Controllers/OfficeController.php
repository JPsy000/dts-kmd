<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offices;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Offices::with('users')->get();
        return view('admin.office', compact('offices'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->user_id != null) {
                $addOffice = Offices::where('id', $request->user_id)->first();
                if (!$addOffice) {
                    return redirect()->back()->with('error', 'Office not found');
                }
                $message = 'Updated';
            } else {
                $addOffice = new Offices();
                $message = 'Added';
            }
            $addOffice->office_name = $request->office;
            $addOffice->added_by = Auth::user()->id;

            $addOffice->save();
            return redirect()->back()->with('message', "Successfully $message details!")->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to save details: ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function destroy($user_id)
    {
        $officeDelete = Offices::where('id', $user_id)->firstOrFail();
        if ($officeDelete) {
            $officeDelete->delete();
            return response()->json(['status' => 'success', 'message' => 'Successfully deleted!'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }

    public function getOffice(Request $request)
    {
        $office = Offices::find($request->user_id);
        if ($office) {
            return response()->json(['status' => 'success', 'data' => $office], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }
}
