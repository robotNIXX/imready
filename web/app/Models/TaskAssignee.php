<?php


    namespace App\Models;


    use Illuminate\Database\Eloquent\Model;

    class TaskAssignee extends Model
    {
        protected $table    = 'task_assignees';
        protected $fillable = [
            'task_id',
            'assignee_id',
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function task()
        {
            return $this->belongsTo(Task::class, 'task_id');
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function asssignee()
        {
            return $this->belongsTo(User::class, 'assignee_id');
        }
    }
