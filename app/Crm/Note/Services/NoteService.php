<?php

namespace Crm\Note\Services;

use Crm\Customer\Models\Customer;
use Crm\Note\Models\Note;
use Crm\Note\Requests\NoteCreation;
use Crm\Note\Resources\NoteResource;

class NoteService
{

    public function index($customerId)
    {
        return Note::where('customer_id',$customerId)->get();
    }

    public function show($customer_id, $id)
    {
        $customer = Customer::find($customer_id);
        $note = Note::find($id);
        if($note->customer_id != $customer->id)
        {
            return false;
        }
        return $note;
    }

    public function create(NoteCreation $request, $customerId)
    {
        $note = new Note();
        $note['customer_id'] = $customerId;
        $note['note'] = $request->note;
        $note->save();

        return new NoteResource($note);
    }

    public function update(NoteCreation $request, $customerId, $id)
    {
        $note = Note::find($id);

        if(!$note) {
            return false;
        }
        $customerId = (int)$customerId;

        if($note->customer_id !== $customerId) {
            return false;
        }

        $note->note = $request->get('note');
        $note->save();

        return $note;
    }

    public function delete($customerId, $id)
    {
        $note = Note::find($id);

        if(!$note)
        {
            return false;
        }

        $customerId = (int)$customerId;
        if($note->customer_id !== $customerId)
        {
            return false;
        }
        return $note->delete();
    }


}
