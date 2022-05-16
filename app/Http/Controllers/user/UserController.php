<?php

namespace App\Http\Controllers\user;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $paginate = 8;

    public function about()
    {
        return view('user.about');
    }

    public function events()
    {
        $current_date = date('Y-m-d H:i:s');
        $events = Event::where('status', '=', '1')
            ->where('end_date', '>', $current_date)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);
        return view('user.events', compact('events'));
    }

    public function eventsSearch(Request $request)
    {
        $keyword = $request->keyword;

        $current_date = date('Y-m-d H:i:s');
        $events = Event::whereRaw("(name like '%" . $keyword . "%' or description like '%" . $keyword . "%' or location like '%" . $keyword . "%' or start_date like '%" . $keyword . "%' or end_date like '%" . $keyword . "%' or famous_person like '%" . $keyword . "%' or free_food like '%" . $keyword . "%')")
            ->where('status', '=', '1')
            ->where('end_date', '>', $current_date)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('user.events', compact('events', 'keyword'));
    }
}
