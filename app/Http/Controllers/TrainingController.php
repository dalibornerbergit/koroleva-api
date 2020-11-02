<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingResource;
use App\Http\Resources\TrainingResourceCollection;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request): TrainingResourceCollection
    {
        $query = Training::query();

        $query->with('members');

        if (json_decode($request->group_id))
            $query->where('group_id', $request->group_id);


        return new TrainingResourceCollection($query->latest()->paginate(30));
    }

    public function store(Request $request): TrainingResource
    {
        $request->validate([
            'date' => 'required',
            'record' => 'required',
            'group_id' => 'required',
        ]);

        $training = Training::create($request->all());

        $training->group;

        return new TrainingResource($training);
    }

    public function show(Training $training): TrainingResource
    {
        return new TrainingResource($training);
    }

    public function update(Training $training, Request $request): TrainingResource
    {
        $training->update($request->all());

        $training->refresh();

        return new TrainingResource($training);
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return response()->json();
    }
}
