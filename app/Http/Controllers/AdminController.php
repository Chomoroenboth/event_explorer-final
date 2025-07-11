<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $requests = EventRequest::where('approval_status', EventRequest::APPROVAL_STATUS_PENDING)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('admin.dashboard', [
            'eventRequests' => $requests,
        ]);
    }

    // NEW METHOD: Display all approved/published events
    public function events()
    {
        $approvedEvents = EventRequest::where('approval_status', EventRequest::APPROVAL_STATUS_APPROVED)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.events', [
            'events' => $approvedEvents,
        ]);
    }

    public function editProposeEvent(Request $request)
    {
        try {
            $eventRequestId = $request->route('id');
            $eventRequest = EventRequest::where('id', $eventRequestId)
                ->where('approval_status', EventRequest::APPROVAL_STATUS_PENDING)->first();

            return view('admin.edit_propose_event', [
                'eventRequest' => $eventRequest,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Event request not found or an error occurred.']);
        }
    }
}