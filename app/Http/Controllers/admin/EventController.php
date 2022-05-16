<?php

namespace App\Http\Controllers\admin;

use DateTime;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public $paginate = 10;

    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->paginate($this->paginate);
        return view('admin.events.index', compact('events'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $status = $request->status;

        if ($status == '-1') {
            $events = Event::where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('location', 'like', '%' . $keyword . '%')
                ->orWhere('start_date', 'like', '%' . $keyword . '%')
                ->orWhere('end_date', 'like', '%' . $keyword . '%')
                ->orWhere('famous_person', 'like', '%' . $keyword . '%')
                ->orWhere('free_food', 'like', '%' . $keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate($this->paginate);
        } else {
            $events = Event::whereRaw("(name like '%" . $keyword . "%' or description like '%" . $keyword . "%' or location like '%" . $keyword . "%' or start_date like '%" . $keyword . "%' or end_date like '%" . $keyword . "%' or famous_person like '%" . $keyword . "%' or free_food like '%" . $keyword . "%') and (status = " . $status . ")")
                ->orderBy('id', 'DESC')
                ->paginate($this->paginate);
        }

        return view('admin.events.index', compact('events', 'keyword', 'status'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'location' => 'required|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'famous_person' => 'required|max:255',
                'free_food' => 'required|max:255',
                'status' => 'required|numeric|in:0,1',
            ],
            [
                'name.required' => 'Event name is required!',
                'name.max' => 'Event name must be less than 255 characters!',
                'description.required' => 'Event description is required!',
                'description.max' => 'Event description must be less than 255 characters!',
                'location.required' => 'Event location is required!',
                'location.max' => 'Event location must be less than 255 characters!',
                'start_date.required' => 'Event start date is required!',
                'start_date.date' => 'Event start date must be a date!',
                'end_date.required' => 'Event end date is required!',
                'end_date.date' => 'Event end date must be a date!',
                'image.required' => 'Event image is required!',
                'image.image' => 'Event image must be an image!',
                'image.mimes' => 'Event image must be a jpeg, png, jpg, gif, or svg file!',
                'image.max' => 'Event image must be less than 2MB!',
                'famous_person.required' => 'Event famous person is required!',
                'famous_person.max' => 'Event famous person must be less than 255 characters!',
                'free_food.required' => 'Event free food is required!',
                'free_food.max' => 'Event free food must be less than 255 characters!',
                'status.required' => 'Event status is required!',
                'status.numeric' => 'Event status must be a number!',
                'status.in' => 'Event status must be 0 or 1!',
            ],
        );

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->famous_person = $this->tagsinputToJson($request->famous_person);
        $event->free_food = $this->tagsinputToJson($request->free_food);
        $event->status = $request->status;

        $event->start_date = new DateTime($request->start_date);
        $event->end_date = new DateTime($request->end_date);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/events/images');
            $image->move($destinationPath, $name);
            $event->image = $name;
        }

        $event->save();
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $event->famous_person = $this->jsonToTagsinput($event->famous_person);
        $event->free_food = $this->jsonToTagsinput($event->free_food);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'location' => 'required|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'famous_person' => 'required|max:255',
                'free_food' => 'required|max:255',
                'status' => 'required|numeric|in:0,1',
            ],
            [
                'name.required' => 'Event name is required!',
                'name.max' => 'Event name must be less than 255 characters!',
                'description.required' => 'Event description is required!',
                'description.max' => 'Event description must be less than 255 characters!',
                'location.required' => 'Event location is required!',
                'location.max' => 'Event location must be less than 255 characters!',
                'start_date.required' => 'Event start date is required!',
                'start_date.date' => 'Event start date must be a date!',
                'end_date.required' => 'Event end date is required!',
                'end_date.date' => 'Event end date must be a date!',
                'image.image' => 'Event image must be an image!',
                'image.mimes' => 'Event image must be a jpeg, png, jpg, gif, or svg file!',
                'image.max' => 'Event image must be less than 2MB!',
                'famous_person.required' => 'Event famous person is required!',
                'famous_person.max' => 'Event famous person must be less than 255 characters!',
                'free_food.required' => 'Event free food is required!',
                'free_food.max' => 'Event free food must be less than 255 characters!',
                'status.required' => 'Event status is required!',
                'status.numeric' => 'Event status must be a number!',
                'status.in' => 'Event status must be 0 or 1!',
            ],
        );

        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->famous_person = $this->tagsinputToJson($request->famous_person);
        $event->free_food = $this->tagsinputToJson($request->free_food);
        $event->status = $request->status;

        $event->start_date = new DateTime($request->start_date);
        $event->end_date = new DateTime($request->end_date);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/events/images');
            $image->move($destinationPath, $name);
            $event->image = $name;
        }

        $event->save();
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function delete(Request $request)
    {
        $event = Event::find($request->id);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function status(Request $request)
    {
        $event = Event::find($request->id);
        $event->status = !$event->status;
        $event->save();
        return redirect()->route('admin.events.index')->with('success', 'Event status updated successfully!');
    }

    private function tagsinputToJson($tags)
    {
        $tags = explode(',', $tags);
        $tags = array_map('trim', $tags);
        $tags = array_filter($tags);
        $tags = array_unique($tags);
        $tags = array_values($tags);
        return json_encode($tags);
    }

    private function jsonToTagsinput($json)
    {
        $tags = json_decode($json);
        $tags = array_map('trim', $tags);
        $tags = array_filter($tags);
        $tags = array_unique($tags);
        $tags = array_values($tags);
        return implode(',', $tags);
    }
}
