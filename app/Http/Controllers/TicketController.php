<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function getTickets(Request $request){
        return [
            'tickets' => Ticket::getAll()
        ];
    }

    public function storeTicket(Request $request){
        $validatedData = $request->validate(["user_id" => "required|integer|min:0"]);
        return [
            "ticket" => Ticket::create(["user_id" => $validatedData["user_id"]])
        ];
    }

    public function editTicket(Request $request){
        $validatedData = $request->validate([
            "user_id" => "required|integer|min:0",
            "id" => "required|integer|min:0",
        ]);
        $ticket = Ticket::findOrFail($validatedData["id"]);
        $ticket->user_id = $validatedData["user_id"];
        $ticket->save();
        return [
            "ticket" => $ticket
        ];
    }

    public function deleteTicket(Request $request){
        return Ticket::findOrFail($request->id)->delete();
    }

    public function getMyTickets(Request $request){
        return [
            "tickets" => $request->user()->myTickets()
        ];
    }

    public function requestTicket(Request $request){
        $validatedData = $request->validate(["id" => "required|integer|min:0"]);
        $ticket = Ticket::findOrFail($validatedData['id']);
        $ticket->requested = true;
        $ticket->save();
        return [
            "ticket" => $ticket
        ];
    }

}
