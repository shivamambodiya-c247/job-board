<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        
        User::factory()->create([
            'name' => 'Shivam',
            'email' => 'shivam@gmail.com',
            'password' => '123456789',
        ]);

        $users = User::all()->shuffle();
        // User::factory(10)->create();
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = \App\Models\Employer::all();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }


        // Job::factory(99)->create();
        foreach ($users as $user) {
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                \App\Models\JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }

    }
}
