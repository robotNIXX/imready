<?php


    namespace App\Transformers;


    use App\Models\Task;
    use League\Fractal\TransformerAbstract;

    class TasksTransformer extends TransformerAbstract
    {
        public function transform(Task $task)
        {
            return [
                'id'           => $task->id,
                'title'        => $task->title,
                'status'       => $task->status,
                'status_title' => Task::status2Text($task->status),
            ];
        }
    }
