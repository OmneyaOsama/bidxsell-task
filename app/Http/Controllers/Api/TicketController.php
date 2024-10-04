<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Facades\GeneralAdmissionFacade;
use App\Facades\VipAdmissionFacade;
use App\Facades\GroupBookingFacade;
use App\Http\Requests\GeneralAdmissionRequest;
use App\Http\Requests\VipAdmissionRequest;
use App\Http\Requests\GroupBookingRequest;
use App\Helpers\ApiResponseFormate;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|in:General,VIP,Group',
            'event_id' => 'required|exists:events,id',
        ]);
        switch ($request->input('category')) {
            case 'General':
                return $this->handleGeneralAdmission(new GeneralAdmissionRequest($request->all()));

            case 'VIP':
                return $this->handleVipAdmission(new VipAdmissionRequest($request->all()));

            case 'Group':
                return $this->handleGroupBooking(new GroupBookingRequest($request->all()));

            default:
                return ApiResponseFormate::error('Invalid category provided.', 400);
        }
    }

    protected function handleGeneralAdmission(GeneralAdmissionRequest $request)
    {
        $ticket = GeneralAdmissionFacade::createTicket($request);

        return ApiResponseFormate::success(new TicketResource($ticket), 'General Admission ticket purchased successfully.', 201);
    }

    protected function handleVipAdmission(VipAdmissionRequest $request)
    {
        $ticket = VipAdmissionFacade::createTicket($request);

        return ApiResponseFormate::success(new TicketResource($ticket), 'VIP Admission ticket purchased successfully.', 201);
    }

    protected function handleGroupBooking(GroupBookingRequest $request)
    {
        $ticket = GroupBookingFacade::createTicket($request);

        return ApiResponseFormate::success(new TicketResource($ticket), 'Group Booking ticket purchased successfully.', 201);
    }
}
