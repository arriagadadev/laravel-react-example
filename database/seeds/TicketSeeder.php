<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'user_id' => 2,
            'requested' => true
        ]);
        Ticket::create([
            'user_id' => 2,
            'requested' => true
        ]);
        Ticket::create([
            'user_id' => 2
        ]);
        Ticket::create([
            'user_id' => 2
        ]);
        Ticket::create([
            'user_id' => 2
        ]);
        Ticket::create([
            'user_id' => 2
        ]);
    }
}
