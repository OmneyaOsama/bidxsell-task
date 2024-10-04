<?php
namespace App\Http\Controllers\Api;

use App\Facades\EventServiceFacade as EventService;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Helpers\ApiResponseFormate;
use App\Http\Resources\EventResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = EventService::getAllEvents();
        return ApiResponseFormate::success(EventResource::collection($events), 'Events retrieved successfully.');
    }

    public function show(EventRequest $request)
    {
        $id=$request->input('event_id');
        $event = EventService::getEventById($id);
        return ApiResponseFormate::success(new EventResource($event), 'Event details retrieved successfully.');
    }

    public function store(CreateEventRequest $request)
    {
        $event = EventService::createEvent($request->validated());
        return ApiResponseFormate::success(new EventResource($event), 'Event created successfully.', 201);
    }

  
}
