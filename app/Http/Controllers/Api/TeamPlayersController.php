<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;

class TeamPlayersController extends App\Http\Controllers\Controller
{
    /**
     * @var App\Team
     */
    public $teams;

    /**
     * @var App\Player
     */
    public $players;

    /**
     * TeamsController constructor.
     * @param App\Team $team
     */
    public function __construct(App\Team $team, App\Player $player)
    {
        $this->teams = $team;
        $this->players = $player;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $team)
    {
        return response()->json($team->players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreTeam $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\AttachTeamPlayer $request, $team)
    {
        $player = $this->players->find($request->get('player_id'));

        $player->team_id = $team->id;
        $player->save();

        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($team, $player)
    {
        if (!$team->players->contains($player->id)) {
            abort(404);
        }

        return response()->json($player);
    }

    /**
     * @param $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($team, $player)
    {
        if (!$team->players->contains($player->id)) {
            abort(404);
        }

        $player->team_id = null;
        $player->save();

        return response()->json(null, 204);
    }
}