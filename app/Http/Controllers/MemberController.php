<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Http\Resources\MemberResourceCollection;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(): MemberResourceCollection
    {
        return new MemberResourceCollection(Member::paginate());
    }

    public function store(Request $request): MemberResource
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'record' => 'required',
            'group_id' => 'required',
        ]);

        $member = Member::create($request->all());

        return new MemberResource($member);
    }

    public function show(Member $member): MemberResource
    {
        return new MemberResource($member);
    }

    public function update(Member $member, Request $request): MemberResource
    {
        $member->update($request->all());

        return new MemberResource($member);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json();
    }
}
