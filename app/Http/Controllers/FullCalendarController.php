<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Schedule;
class FullCalendarController extends Controller
{
    public function index(Request $request){
        $id = request('id');
        if(Auth::user()->name !== "admin"){
            return redirect('/')->with("error", "Unauthorized access! You do not have admin privileges!");
        }
        $schedule = Schedule::find($id);
            if($request->ajax()){// proverava da li je poslat ajax request, ako jeste izvrsava if
            $data = Event::whereDate('start', '>=' , $request->start)->whereDate('end', '<=', $request->end)->get(['id','title','start','end']);
            return response()->json($data);
        } 
        return view('full-calender')->with('schedule', $schedule)->with('user', $schedule->user);   
    }
    public function action(Request $request){
        if(Auth::user()->name !== "admin"){
            return redirect('/')->with("error", "Unauthorized access! You do not have admin privileges!");
        }
        if($request->ajax()){
            $id = request('id'); 
            if($request->type == 'add'){
                $event = Event::create([
                    'title'  => $request->title,
                    'start' => $request->start,
                    'end' =>  $request->end,
                    'schedule_id' =>  $request->schedule_id,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'cover_image' => $request->cover_image

                ]);
                $schedule = Schedule::find($request->schedule_id);
                $schedule->delete();
                return response()->json($event);
            }
            if($request->type == 'update'){
                $event = Event::find($request->id)->update([
                    'title'  => $request->title,
                    'start' => $request->start,
                    'end' =>  $request->end,
                    'schedule_id' =>  $request->schedule_id,
                    'description' => $request->description,
                    'user_id' => $request->user_id
                ]);
                return response()->json($event);
            }
            if($request->type == 'delete'){
                $event = Event::find($request->id)->delete();
                return response()->json($event);
            }
           
    }
}
}