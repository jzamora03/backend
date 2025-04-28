<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Jhoseph Zamora', 'email' => 'jhoseph@example.com', 'password' => bcrypt('admin123')],
            ['name' => 'María Gómez', 'email' => 'maria@example.com', 'password' => bcrypt('admin123')],
            ['name' => 'Laura Moreno', 'email' => 'laura@example.com', 'password' => bcrypt('admin123')],
            ['name' => 'Carlos Rodríguez', 'email' => 'carlos@example.com', 'password' => bcrypt('admin123')],
            ['name' => 'Jhon Doe', 'email' => 'jhon@example.com', 'password' => bcrypt('admin123')],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }


}
