<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Presence;
use App\Models\Training;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class PresenceController extends Controller
{
    public function index()
    {
        // $member = Member::find(63);

        // $training = Training::find(28);

        // return $training->members;

        // dd($request->training_id);

        // $member->trainings()->attach([15, 16, 17, 18]);

        // dd($member->trainings());

        // $training = Training::find($request->training_id);

        // $training->members()->attach([63, 64, 65]);

        // return Presence::paginate();
    }

    // public function getMembers($id) {
    //     $training = Training::find($id);

    //     return $training->members;
    // }

    public function attachMembers(Request $request)
    {
        $training = Training::find($request->training_id);

        $training->members()->detach();

        $training->members()->attach(json_decode($request->members));
    }
}
