<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;


class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Completar documentación',
            'description' => 'Escribir la documentación del sistema.',
            'status' => 'pendiente',
            'user_id' => 1,
            'user_assigned' => 5,
        ]);

        Task::create([
            'title' => 'Revisar seguridad',
            'description' => 'Auditar las configuraciones de seguridad.',
            'status' => 'en proceso',
            'user_id' => 4,
            'user_assigned' => 3,
        ]);

        Task::create([
            'title' => 'Optimizar la base de datos',
            'description' => 'Mejorar el rendimiento de las consultas SQL.',
            'status' => 'completada',
            'user_id' => 3,
            'user_assigned' => 5,
        ]);

        Task::create([
            'title' => 'Revisar las HU del backlog',
            'description' => 'Revisar en azure las HU que se encuentran en el backlog del back.',
            'status' => 'en proceso',
            'user_id' => 2,
            'user_assigned' => 1,
        ]);

        Task::create([
            'title' => 'Nuevas funcionalidades',
            'description' => 'Relizar nuevas funcionalidades en el backend, deacuerdo a las HU',
            'status' => 'pendiente',
            'user_id' => 4,
            'user_assigned' => 1,
        ]);
    }

}
