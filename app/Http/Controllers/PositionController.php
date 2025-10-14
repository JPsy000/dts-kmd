<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Positions;
use App\Offices;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positionQuery = Positions::with('officeRel')->get();
        $officeQuery = Offices::all();
        return view('admin.position', compact('positionQuery', 'officeQuery'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->user_id != null) {
                $addPosition = Positions::where('id', $request->user_id)->first();
                if (!$addPosition) {
                    return redirect()->back()->with('error', 'Position not found');
                }
                $message = 'Updated';
            } else {
                $addPosition = new Positions();
                $message = 'Added';
            }
            $addPosition->office_id = $request->office_id;
            $addPosition->position_name = $request->position_name;

            $addPosition->save();
            return redirect()->back()->with('message', "Successfully $message details!")->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to save details: ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function destroy($user_id)
    {
        $positionDelete = Positions::where('id', $user_id)->firstOrFail();
        if ($positionDelete) {
            $positionDelete->delete();
            return response()->json(['status' => 'success', 'message' => 'Successfully deleted!'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }

    public function getPositionsByOffice($office_id)
    {
        $positions = \App\Positions::where('office_id', $office_id)->get(['id', 'position_name']);
        return response()->json($positions);
    }

    public function getPosition(Request $request)
    {
        $position = Positions::find($request->user_id);
        if ($position) {
            return response()->json(['status' => 'success', 'data' => $position], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }
}
