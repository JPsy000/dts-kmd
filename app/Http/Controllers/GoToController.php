<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocTrack;

class GoToController extends Controller
{

    public function goToIncoming()
    {

        $docTrack = DocTrack::with('DocTrack')->get();
        // To view the from (office name) column in the incoming documents
        $docTrack = DocTrack::with('IncomingOffice')->get();
        return view('users.incoming', compact('docTrack'));
    }

    public function goToReceived()
    {
        $docTracks = DocTrack::with('DocTrack')->get();
        // To view the from (office name) column in the received documents
        $docTracks = DocTrack::with('IncomingOffice')->get();
        return view('users.received', compact('docTracks'));
    }

    public function goToOutgoing()
    {

        $docTrack1 = DocTrack::with('DocTrack')->get();
        // To view the from (office name) column in the outgoing documents
        $docTrack1 = DocTrack::with('IncomingOffice')->get();
        return view('users.outgoing', compact('docTrack1'));
    }

    public function goToComplete()
    {

        $docTrack2 = DocTrack::with('DocTrack')->get();
        // To view the from (office name) column in the complete documents
        $docTrack2 = DocTrack::with('IncomingOffice')->get();
        return view('users.complete', compact('docTrack2'));
    }
}
