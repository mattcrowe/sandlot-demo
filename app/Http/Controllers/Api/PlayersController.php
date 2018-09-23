<?php

namespace App\Http\Controllers\Api;

use App;
use Illuminate\Http\Request;

class PlayersController extends App\Http\Controllers\Controller
{
    /**
     * @var Player
     */
    public $players;

    /**
     * ApiController constructor.
     * @param Player $player
     */
    public function __construct(App\Player $player)
    {
        $this->players = $player;
    }

    /**
     * @param $id
     */
    public function get($id)
    {
        return $this->players->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        //$this->authorize(['view', 'create', 'update', 'delete'], Player::class);

        //$request = Requests\PaginatePlayers::extend($request);

        //$paginator = $this->paginator($this->players->query(), $request);

        return response()->json($this->players->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($player)
    {
        return response()->json($player);
    }
}