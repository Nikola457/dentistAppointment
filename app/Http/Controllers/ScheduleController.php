<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use  App\Models\Schedule;
use App\Models\Auth;
use App\Models\Event;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'dateStart'  => 'required',
            'dateEnd' => 'required',
            'message' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $schedule = new Schedule();
        if($request->hasFile('cover_image')){
            $fileNameExt =  $request->file('cover_image')->getClientOriginalName(); //gets the file name
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = "noimage.jpg";
        }
          //      $today = new Date();
//        $isToday = (today.toDateString() == otherDate.toDateString());
       /* $dateStart = Carbon::parse($request->input('dateStart'));
        $currentDateTime = Carbon::parse($currDate);
        $newDateTime = Carbon::parse($currDate)->addMinutes(45);
        $oldDateTime = Carbon::parse($currDate)->subMinute(45);
         $scheduleTime = Schedule::select('scheduleDate')->where('scheduleDate','<=', $newDateTime)->where('scheduleDate', '>=', $oldDateTime)->get()->count();
        if($scheduleTime >  0){
            $error = "Izaberite neki drugi termin";
            return redirect('/schedule/create')->with("error","Termin je zauzet! Pokusajte neki drugi");
        }*/
            $schedule->scheduleDate = $request->input('dateStart');
            $schedule->scheduleEndDate = $request->input('dateEnd');
            $schedule->subject = $request->input('subject');    
            $schedule->message = $request->input('message'); 
            $schedule->cover_image = $fileNameToStore;
            $schedule->user_id =  auth()->user()->id;
            $schedule->save();
            return redirect('/')->with("success","Uspesno ste zakazali termin!");
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ids= request('id'); 
        $schedule = Schedule::find($ids);
        return view('schedule.show')->with('schedule', $schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('unscheduled')->with('success', 'Schedule successfully deleted!');
    }
  
}
