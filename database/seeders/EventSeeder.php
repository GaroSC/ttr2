<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $days = [1, 5, 6, 9, 13];
        $fake = fake('id-ID');
        $today = date('Y-m-d');

        $users = User::all();
        
        foreach($users as $user) {
            foreach ($days as $day) {
                if (is_array($day)) {
                    $events[] = [
                        'user_id' => $user->id,
                        'title' => $fake->sentence(3),
                        'start_date' => date('Y-m-d', strtotime($today . '+ ' . $day[0] . ' days')),
                        'end_date' => date('Y-m-d', strtotime($today . '+ ' . $day[1] . ' days')),
                        'category' => $fake->randomElement(['success', 'warning', 'danger', 'info', 'primary', 'secondary']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } else {
                    $events[] = [
                        'user_id' => $user->id,
                        'title' => $fake->sentence(3),
                        'start_date' => date('Y-m-d', strtotime($today . '+ ' . $day . ' days')),
                        'end_date' => date('Y-m-d', strtotime($today . '+ ' . $day . ' days')),
                        'category' => $fake->randomElement(['success', 'warning', 'danger', 'info', 'primary', 'secondary']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        Event::insert($events);
    }
}
