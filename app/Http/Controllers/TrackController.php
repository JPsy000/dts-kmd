<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocTrack;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $docTrack = trim($request->get('docTrack'));

        $track = DocTrack::query()
            ->search($docTrack)
            ->select('dms_no')
            ->groupBy('dms_no')              // group duplicates
            ->orderBy('dms_no')
            ->paginate(10)
            ->withQueryString();

        return view('users.track', compact('track', 'docTrack'));
    }
}
