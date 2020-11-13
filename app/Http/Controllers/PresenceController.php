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
    public function attachMembers(Request $request)
    {
        $training = Training::find($request->training_id);

        $training->members()->sync($request->members);

        $training->refresh();

        return $training;
    }
}
