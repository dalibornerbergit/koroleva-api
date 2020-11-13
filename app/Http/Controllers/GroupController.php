<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Http\Resources\GroupResourceCollection;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(): GroupResourceCollection
    {
        return new GroupResourceCollection(Group::with('members')->latest()->get());
    }

    public function store(Request $request): GroupResource
    {
        $request->validate([
            'name' => 'required',
            'record' => 'required'
        ]);

        $group = Group::create($request->all());

        return new GroupResource($group);
    }

    public function show(Group $group): GroupResource
    {
        $group->trainings;
        return new GroupResource($group);
    }

    public function update(Group $group, Request $request): GroupResource
    {
        $group->update($request->all());
        
        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json();
    }
}