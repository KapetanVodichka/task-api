<?php

namespace Database\Seeders;

use App\Models\Task;
use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Task::query()->exists()) {
            return;
        }

        Task::query()->create([
            'title' => 'Настроить проект',
            'description' => 'Создать проект Laravel и настроить Docker.',
            'status' => TaskStatus::Todo->value,
        ]);

        Task::query()->create([
            'title' => 'Реализовать API задач',
            'description' => 'Сделать CRUD-эндпоинты и валидацию.',
            'status' => TaskStatus::InProgress->value,
        ]);

        Task::query()->create([
            'title' => 'Подготовить README',
            'description' => 'Описать запуск и примеры использования API.',
            'status' => TaskStatus::Done->value,
        ]);
    }
}
