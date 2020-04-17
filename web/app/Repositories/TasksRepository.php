<?php


    namespace App\Repositories;


    use App\Models\Task;
    use Prettus\Repository\Eloquent\BaseRepository;

    class TasksRepository extends BaseRepository
    {

        public function model()
        {
            return Task::class;
        }
    }
