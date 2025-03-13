<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VotingReaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reaction = new VotingReaction();
        $reaction->user_id = '67abbcd15a7cf058d80fe252';
        $reaction->voting_id = '67d152ad7c6dc7813f09d1ac';
        $reaction->type = 'yes';
        $reaction->save();
    }
}
