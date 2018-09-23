<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;

class TeamsController extends App\Http\Controllers\Controller
{
    /**
     * @var App\Team
     */
    public $teams;

    /**
     * TeamsController constructor.
     * @param App\Team $team
     */
    public function __construct(App\Team $team)
    {
        $this->teams = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $qb = $this->teams->orderBy('name');

        if ($needle = $request->get('q')) {
            $qb->where('name', 'LIKE', "%$needle%");
        }

        return response()->json($qb->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreTeam $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\StoreTeam $request)
    {
        $input = $request->all();

        $team = $this->teams->create(['name' => $input['name']]);

        $team->save();

        return response()->json($team, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($team)
    {
        $team->players;

        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdateTeam $request
     * @param $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\UpdateTeam $request, $team)
    {
        $input = $request->all();

        $this->set($team, $input, [
            'name',
        ]);

        $team->save();

        return response()->json($team);
    }

    /**
     * @param $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($team)
    {
        $team->delete();

        return response()->json(null, 204);
    }
}