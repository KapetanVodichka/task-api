# Tasks API

REST API для управления задачами (Laravel + MySQL).

## Запуск (Docker)

1. Клонировать проект и перейти в каталог:
```bash
git clone https://github.com/KapetanVodichka/task-api
cd task-api
```

2. Создать `.env` из примера:
```bash
cp .env.example .env
```

3. Заполнить настройки БД в `.env`:
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_DATABASE=task_api
DB_USERNAME=task_api
DB_PASSWORD=task_api
```

4. Запустить контейнеры:
```bash
docker compose up -d --build
```

Миграции и сиды выполняются автоматически при старте контейнера. Нужно дождаться запуска проекта в логах:
```bash
docker compose logs -f app
```

## Эндпоинты

- `POST /tasks` — создать задачу (`title`, `description`, `status`)
- `GET /tasks` — список задач
- `GET /tasks/{id}` — одна задача
- `PUT /tasks/{id}` — обновить задачу
- `DELETE /tasks/{id}` — удалить задачу

Значения `status`: `todo`, `in_progress`, `done`.

## Быстрый тест

```bash
curl -s -H "Accept: application/json" http://127.0.0.1:8000/tasks
```
