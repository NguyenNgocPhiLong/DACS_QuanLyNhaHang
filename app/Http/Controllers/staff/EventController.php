<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('admin.Event.fullcalender');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id'=>Auth::user()->id,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $id = Session::get('id');
                $result = Event::find($request->id);
                if ($result->user_id == $id)
                $event = Event::find($request->id)->delete();
                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }

    public function SuaLich($id){
        $event = Event::find($id);
        return view('admin.Event.edit-calendar',['Events'=>$event]);
    }
    public function PostSuaLich($id, Request $req) {
        $user_id = $req->Session()->get('id');
        $req->merge(['id'=>$user_id]);
        Event::find($id)->update($req->all());
        return redirect()->route('show1');
    }
    public function XoaLich($id){
        Event::destroy($id);
        return redirect()->route('show1');
    }
    public function Show(){
//        $user_id = Session::get('user_id');
//        $ten=DB::table('users,lich_lam')
//            ->select('Ten')
//            ->where('users.id','=','lich_lam'.$user_id);
//        $Event=DB::table('lich_lam')
//            ->join('lich_lam','users.id','=','lich_lam.user_id')
//            ->select('*')
//            ->get();
        return view('admin.Event.show-full_events',['Events'=>Event::all()],['Users'=>User::all()]);
//        $Event=DB::table("users, lich_lam")
//            ->select("title", "start", "end", "ten")
//            ->join()
//            ->where("users.id", "=", 'lich_lam.user_id')
//            ->get();
//        return view('admin.Event.show-full_events',compact('Event'));

    }
    public function ThemEvent(){
        return view('admin.Event.them_event');
    }
    public function PostThemEvent(Request $req){
        $user_id = $req->Session()->get('user_id');
        $req->merge(['user_id'=>$user_id]);
        Event::create($req->all());
        return redirect()->route('fullcalender1');
    }
}
