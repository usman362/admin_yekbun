<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Voting;
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
        $users = User::where('email', '!=', 'admin@gmail.com')->get();
        $votes = Voting::all();
        foreach ($users as $user) {
            foreach ($votes as $vote) {
                VotingReaction::updateOrCreate(
                    ['user_id' => $user->id, 'voting_id' => $vote->id],
                    ['type' => rand(1, 3)]
                );
            }
        }
    }
}
