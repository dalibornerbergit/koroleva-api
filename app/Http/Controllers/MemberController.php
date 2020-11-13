<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Http\Resources\MemberResourceCollection;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request): MemberResourceCollection
    {
        $query = Member::query();

        if ($request->first_name) {
            $query->where('first_name', 'like', '%' .  $request->first_name . '%');
        }

        if (json_decode($request->group_id)) {
            $query->where('group_id', 'like', $request->group_id);
        }

        return new MemberResourceCollection($query->latest()->paginate(32));
    }

    public function store(Request $request): MemberResource
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'record' => 'required',
            'group_id' => 'required',
        ]);

        $member = Member::create($request->all());

        $member->group;

        return new MemberResource($member);
    }

    public function show(Member $member): MemberResource
    {
        $member->trainings;

        return new MemberResource($member);
    }

    public function update(Member $member, Request $request): MemberResource
    {
        $member->update($request->all());

        $member->refresh();

        return new MemberResource($member);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json();
    }
}
