<?php

namespace App\Http\Controllers;

use Crm\Note\Requests\NoteCreation;
use Crm\Note\Resources\NoteResource;
use Crm\Note\Services\NoteService;
use Illuminate\Http\Response;

class NotesController extends Controller
{

    private NoteService $noteService;
    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function index($customerId)
    {
        return NoteResource::collection($this->noteService->index($customerId));
    }

    public function show($customer_id, $id)
    {

        return new NoteResource($this->noteService->show($customer_id, $id)) ??
            response()->json(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
    }

    public function create(NoteCreation $request, $customerId)
    {
        return new NoteResource($this->noteService->create($request, $customerId));
    }


    public function update(NoteCreation $request, $customerId, $id)
    {
        return new NoteResource($this->noteService->update($request, $customerId, $id)) ??
             response()->json(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
    }


    public function delete($customerId, $id)
    {
        return $this->noteService->delete($customerId, $id) ??
            response()->json(['status' => 'Not Found']);
    }

}
