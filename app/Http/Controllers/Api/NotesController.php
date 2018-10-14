<?php

namespace App\Http\Controllers\Api;

use App, Cookie;
use App\Http\Requests;
use Illuminate\Http\Request;

class NotesController extends App\Http\Controllers\Controller
{
    /**
     * @var App\Note
     */
    public $notes;

    /**
     * NotesController constructor.
     * @param App\Note $note
     */
    public function __construct(App\Note $note)
    {
        $this->notes = $note;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $qb = $this->notes->orderBy('id', 'desc');

        $qb->where('guid', Cookie::get('guid'));

        return response()->json($qb->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreNote $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Requests\StoreNote $request)
    {
        $input = $request->all();

        $note = $this->notes->create([
            'color' => $input['color'],
            'body' => $input['body'],
        ]);

        $note->save();

        return response()->json($note, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($note)
    {
        $this->authorize('view', $note);

        return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdateNote $request
     * @param $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Requests\UpdateNote $request, $note)
    {
        $this->authorize('update', $note);

        $input = $request->all();

        $this->set($note, $input, [
            'color',
            'body',
        ]);

        $note->save();

        return response()->json($note);
    }

    /**
     * @param $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($note)
    {
        $note->delete();

        return response()->json(null, 204);
    }
}