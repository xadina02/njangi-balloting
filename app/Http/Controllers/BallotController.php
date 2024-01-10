<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ballot;
use App\Models\User;
use App\Models\UserBallot;

class BallotController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function user()
    {
        if (session()->has('uid')) {
            $ballots = Ballot::select('id', 'avatar')->where('status', 'available')->orderBy('position')->get();
            $idval = session('uid');
            return view('pick-ballot', compact('ballots', 'idval'));
        }
        else {
            return view('unavailable');
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tel' => 'required|string',
        ]);

        $name = $request->name;
        $tel = $request->tel;

        $idExists = User::where('name', $name)->orWhere('phone_number', $tel)->find('id');
        // echo $idExists;
        // dd($idExists);
        if($idExists == null) {
            $user = new User;
            $user->name = $name;
            $user->phone_number = $tel;
            $user->save();

            session(['uid' => $user->id]);
            return redirect()->route('ballot');
        }
        else {
            $user = UserBallot::where('user_id', $idExists->id)->get();
            // dd($user);
            if($user->isEmpty()) {
                session(['uid' => $idExists->id]);
                return redirect()->route('ballot');
            }
            else {
                return view('unavailable');
            }
        }
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            'ballot' => 'required',
        ]);
        
        $user_id = $id;
        $ballot_id = $request->ballot;

        $userBallot = new UserBallot;
        $userBallot->user_id = $user_id;
        $userBallot->ballot_id = $ballot_id;
        $userBallot->save();

        $ballot = Ballot::where('id', $ballot_id)->first();
        $ballot->status = "unavailable";
        $ballot->save();

        session()->forget('uid');
        return view('success');
    }
}
