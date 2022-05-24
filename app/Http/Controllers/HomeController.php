<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Event;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function unscheduled(){
         $events = Event::paginate(10);
         if(Auth::user()->name !== "admin"){
             return redirect('/')->with("error", "Unauthorized access! You do not have admin privileges!");
         }
         $schedules = Schedule::where('id','!=', "")->get();
         $sched = DB::table('schedules as s')->join('users as u1','s.user_id','=','u1.id')
         ->select('s.*','u1.*','s.id as scheduleId' ,'u1.id as usersId')->get();
         return view('unscheduled')->with('schedules', $sched);
     }
    public function index()
    {
        $user_id = auth()->user()->id;
        $username = auth()->user()->name;
        if($user_id === 1){
            $today = date("Y-m-j H:i:s");
            $sched_2 = DB::table('events as e')->join('users as u','e.user_id','=','u.id',)->select('e.title','e.description','e.start','e.end','e.id','u.name', 'u.phone')->where('e.start','>',$today)->paginate(10);
            return view('dashboard')->with('sched', $sched_2);
        }
        else{
            $param ="";
                if(!empty($_GET['unschedule'])){
                    $param = $_GET['unschedule'];
                 if($_GET['unschedule']==='s'){
                $user = User::find($user_id)->paginate(10);
                $sched = Event::where('user_id','=',$user_id)->paginate(10);
                $schedules = DB::table('schedules as s')->join('users as u','s.user_id','=','u.id',)->select('s.subject as title','s.message as description','s.scheduleDate as start','s.scheduleEndDate as end','s.id','u.name')->where('user_id','=',$user_id)->paginate(10);
                $numberOfSchedules = count($sched);
                return view('dashboard')->with('user',$user)->with('sched',$schedules)->with('numberOfSched', $numberOfSchedules)->with('param', $param);
                    }
                    else {
                        $user = User::find($user_id)->paginate(10);
                        $sched = Schedule::where('user_id','=',$user_id)->where('scheduleDate','!=','')->paginate(10);
                        $schedules = DB::table('events as e')->join('users as u','e.user_id','=','u.id',)->select('e.title','e.description','e.start','e.end','e.id','u.name')->where('user_id','=',$user_id)->paginate(10);
                        $numberOfSchedules = count($sched);
                        return view('dashboard')->with('user',$user)->with('sched',$schedules)->with('numberOfSched', $numberOfSchedules)->with('param', $param);
                    }
                }
                else {
                    $user = User::find($user_id)->paginate(10);
                    $sched = Schedule::where('user_id','=',$user_id)->where('scheduleDate','!=','')->paginate(10);
                    $schedules = DB::table('events as e')->join('users as u','e.user_id','=','u.id',)->select('e.title','e.description','e.start','e.end','e.id','u.name')->where('user_id','=',$user_id)->paginate(10);
                    $numberOfSchedules = count($sched);
                    return view('dashboard')->with('user',$user)->with('sched',$schedules)->with('numberOfSched', $numberOfSchedules)->with('param', $param);
                }
               }
    }
    public function showAllPatients(){
        if(Auth::user()->name !== "admin"){
            return redirect('/')->with("error", "Unauthorized access! You do not have admin privileges!");
        }
        if(!empty($_GET['searchInput'])){
            $searchInput = $_GET['searchInput'];
            $users = User::where('name','LIKE','%'.$searchInput.'%')->orWhere('email','LIKE','%'.$searchInput.'%')->paginate(10);
            $users->appends(['searchInput' => $searchInput]); // dodavanje filtera paginatoru   
            return view('patients')->with('users', $users);
        }
        else{
             
            $users = User::where('name','!=', auth()->user()->name)->paginate(10);
            return view('patients')->with('users', $users);
        }
    }
    //desc filter
    public function showDashboard($id){
        $schedule = Event::find($id);
        return view('dashboard.show')->with('schedule', $schedule);
    }
    public function show($id){
        if(Auth::user()->name !== "admin"){
            return redirect('/')->with("error", "Unauthorized access! You do not have admin privileges!");
        }
        if(!empty($_GET['filterBy'])){
            $filterBy = $_GET['filterBy'];
            if($filterBy === "desc"){
                $schedules = Event::where('user_id', '=', $id)->orderBy('start', 'DESC')->paginate(8);
                $user = User::where('id','=', $id)->get();
                $schedules->appends(['filterBy' => $filterBy]);
                return view('dashboard.history')->with('schedules', $schedules)->with('user', $user);      
            }
            else{
                $schedules = Event::where('user_id', '=', $id)->orderBy('start', 'ASC')->paginate(8);
                $user = User::where('id','=', $id)->get();
                $schedules->appends(['filterBy' => $filterBy]);
                return view('dashboard.history')->with('schedules', $schedules)->with('user', $user);
            }
          }
         
        else {
            $schedules = Event::where('user_id', '=', $id)->paginate(8);
            $user = User::where('id','=', $id)->get();
            return view('dashboard.history')->with('schedules', $schedules)->with('user', $user);
        }
        
    }
    public function destroy($id){
        $schedule = Event::find($id);
        $schedule->delete();   
        return redirect('dashboard')->with('success', 'Schedule succesfully deleted!');
    }
}
