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
            $forwardDoc->from = Auth::user()->office_id;
            $forwardDoc->encoded_by = Auth::user()->id;
            $forwardDoc->to = $request->to;
            $forwardDoc->status = $request->status;
            $forwardDoc->forward_status = $request->forward_status;
            $forwardDoc->active_button = 'Enabled';

            $forwardDoc->save();

            $updateForwardStatus = DocTrack::where('dms_no', $request->dms_no)
                ->orderByDesc('id')
                ->skip(1)
                ->first();

            if ($updateForwardStatus) {

                $updateForwardStatus->active_button = 'Disabled';

                $updateForwardStatus->save();
            }

            return redirect(URL::to('received-documents'))->with('message', 'Forwarded Successfully!')->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to forward. ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function Receive(Request $request)
    {
        try {
            $receiveDoc = new DocTrack();

            $receiveDoc->dms_no = $request->dms_no;
            $receiveDoc->date_received = $request->date_received;
            $receiveDoc->from = $request->from;
            $receiveDoc->encoded_by = $request->encoded_by;
            $receiveDoc->received_by = Auth::user()->id;
            $receiveDoc->status = $request->status;
            $receiveDoc->to = Auth::user()->office_id;
            $receiveDoc->forward_status = $request->forward_status;
            $receiveDoc->active_button = 'Enabled';

            $receiveDoc->save();

            $updateForwardStatus = DocTrack::where('dms_no', $request->dms_no)
                ->orderByDesc('id')
                ->skip(1)
                ->first();

            if ($updateForwardStatus) {

                $updateForwardStatus->date_received = $request->date_received;
                $updateForwardStatus->forward_status = $request->forward_status1;
                $updateForwardStatus->active_button = 'Disabled';

                $updateForwardStatus->save();
            }



            return redirect(URL::to('incoming-documents'))->with('message', 'Forwarded Successfully!')->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to forward. ' . $e->getMessage())->with('icon', 'error');
        }
    }

    public function receivedForward(Request $request, $id)
    {
        $office = Offices::all();
        $docForwards = Documents::find($id);
        return view('tracking.received-forward', compact('docForwards', 'office'));
    }
}
