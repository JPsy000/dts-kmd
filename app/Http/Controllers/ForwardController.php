<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DocTrack;
use App\Documents;
use App\Offices;
use Illuminate\Support\Facades\URL;

class ForwardController extends Controller
{

    public function index(Request $request, $id)
    {
        $office = Offices::all();
        $docForward = Documents::find($id);
        return view('tracking.forward', compact('docForward', 'office'));
    }

    public function store(Request $request)
    {
        try {
            $forwardDoc = new DocTrack();

            $forwardDoc->dms_no = $request->dms_no;
            $forwardDoc->date_released = $request->date_released;
            $forwardDoc->remarks = $request->remarks;
            $forwardDoc->from = $request->from;
            $forwardDoc->encoded_by = Auth::user()->id;
            $forwardDoc->to = $request->to;
            $forwardDoc->afterForward = $request->to;
            $forwardDoc->status = $request->status;
            $forwardDoc->forward_status = $request->forwardstatus;
            $forwardDoc->button_cue = $request->button_cue;

            $forwardDoc->save();

            $forwardStatus = Documents::where('dms_no', $request->dms_no)->first();

            if ($forwardStatus) {
                $forwardStatus->status = $request->forwardstatus;   
                $forwardStatus->save();
            }

            return redirect(URL::to('user-document'))->with('message', 'Forwarded Successfully!')->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to forward. ' . $e->getMessage())->with('icon', 'error');
        }
    }
}
