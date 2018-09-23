<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;

class TeamsController extends App\Http\Controllers\Controller
{
    /**
     * @var Team
     */
    public $teams;

    /**
     * ApiController constructor.
     * @param Team $team
     */
    public function __construct(App\Team $team)
    {
        $this->teams = $team;
    }

    /**
     * @param $id
     */
    public function get($id)
    {
        return $this->teams->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        //$this->authorize(['view', 'create', 'update', 'delete'], Team::class);

        //$request = Requests\PaginateTeams::extend($request);

        //$paginator = $this->paginator($this->teams->query(), $request);

        $qb = $this->teams->query();

        return response()->json($qb->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreTeam $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\StoreTeam $request)
    {
        $input = $request->all();

        $team = $this->teams->create(['name' => $input['name']]);

        $this->set($team, $input, [
        ]);

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
        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateTeam $request
     * @param  string $id
     *
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $team = $this->get($id);

        $this->authorize('delete', $team);

        $this->itemEvent('deleted', $team);

        $team->delete();

        return response()->json(null, 204);
    }
}