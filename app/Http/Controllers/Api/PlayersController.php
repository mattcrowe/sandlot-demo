<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;

class PlayersController extends App\Http\Controllers\Controller
{
    /**
     * @var App\Player
     */
    public $players;

    /**
     * PlayersController constructor.
     * @param App\Player $player
     */
    public function __construct(App\Player $player)
    {
        $this->players = $player;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $qb = $this->players->orderBy('last_name');

        if ($needle = $request->get('q')) {
            $qb->where(function ($sub) use ($needle) {
                $sub->where('first_name', 'LIKE', "%$needle%");
                $sub->orWhere('last_name', 'LIKE', "%$needle%");
            });
        }

        if ($team_id = $request->get('team_id')) {
            $qb->where('team_id', $team_id);
        }

        return response()->json($qb->paginate((int) $request->get('perPage', 15)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StorePlayer $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\StorePlayer $request)
    {
        $input = $request->all();

        $player = $this->players->create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
        ]);

        $player->save();

        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($player)
    {
        $player->team;

        return response()->json($player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdatePlayer $request
     * @param $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\UpdatePlayer $request, $player)
    {
        $input = $request->all();

        $this->set($player, $input, [
            'team_id',
            'first_name',
            'last_name',
        ]);

        $player->save();

        return response()->json($player);
    }

    /**
     * @param $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($player)
    {
        $player->delete();

        return response()->json(null, 204);
    }
}