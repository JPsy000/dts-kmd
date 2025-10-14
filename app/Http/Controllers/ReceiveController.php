<?php

namespace App\Http\Controllers;

use App\DocTrack;
use App\Documents;
use App\Offices;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiveController extends Controller
{
    public function index($id)
    {
        $receive = DocTrack::with('DocTrack')->find($id);
        return view('tracking.receive', compact('receive'));
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
            $forwardDoc->to = NULL;
            $forwardDoc->afterReceive = Auth::user()->office_id;
            $forwardDoc->afterForward = $request->to;
            $forwardDoc->status = $request->status;
            $forwardDoc->date_received = $request->date_received;
            $forwardDoc->received_by = $request->received_by;
            $forwardDoc->forward_status = $request->forward_status;
            $forwardDoc->button_cue = $request->button_cue;

            $forwardDoc->save();

            return redirect(URL::to('received-documents'))->with('message', 'Forwarded Successfully!')->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to forward. ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function DocTrackUpdate(Request $request)
    {
        try {
            $updateDocTrack = DocTrack::where('id', $request->doctrack_id)->first();

            $updateDocTrack->date_received = $request->date_received;
            $updateDocTrack->received_by = $request->received_by;
            $updateDocTrack->to = $request->to;
            $updateDocTrack->afterReceive = $request->afterReceive;
            $updateDocTrack->forward_status = $request->forward_status;
            $updateDocTrack->button_cue = $request->button_cue;
            $updateDocTrack->save();

            return redirect('/incoming-documents')->with('message', 'Document received successfully!')->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to receive document: ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function receivedForward(Request $request, $id)
    {
        $office = Offices::all();
        $docForwards = Documents::find($id);
        return view('tracking.received-forward', compact('docForwards', 'office'));
    }
}
