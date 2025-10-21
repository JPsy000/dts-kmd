<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocTrack;
use Illuminate\Support\Facades\Auth;
use App\Documents;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $docTrack = trim($request->get('docTrack'));
        $track1 = DocTrack::with('DocTracks')->get();
        $track = DocTrack::query()
            ->when($docTrack, function ($q) use ($docTrack) {
                $q->where(function ($q2) use ($docTrack) {
                    $q2->search($docTrack)
                        ->orWhereHas('DocTracks', function ($r) use ($docTrack) {
                            $r->where('dms_no', 'like', '%' . $docTrack . '%');
                        });
                });
            })
            ->select('dms_no')
            ->groupBy('dms_no')
            ->orderBy('dms_no')
            ->paginate(10)
            ->withQueryString();

        return view('users.track', compact('track', 'docTrack', 'track1'));
    }

    public function TrackHistory($dms_no)
    {
        $trackHis1 = Documents::find($dms_no);
        $trackHis = DocTrack::with(['DocTracks', 'doc_track', 'IncomingOffice', 'IncomingOfficeTo'])
            ->where('dms_no', $dms_no)
            ->where(function ($q) {
                $q->where('date_released', null)
                    ->orWhere('date_received', null)
                    ->orwhere('date_released', '!=', null);
            })
            ->latest()
            ->get();
        return view('users.track-history', compact('trackHis', 'trackHis1'));
    }
}
