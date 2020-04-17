<?php


    namespace App\Models;


    use App\Enums\TaskStatusEnum;
    use Illuminate\Database\Eloquent\Model;
    use phpDocumentor\Reflection\Types\Integer;
    use Spatie\MediaLibrary\HasMedia\HasMedia;
    use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

    class Task extends Model implements HasMedia
    {
        use HasMediaTrait;

        protected $table = 'tasks';


        public static function status2Text(Integer $status)
        {
            switch ($status) {
                default:
                case (TaskStatusEnum::CREATED):
                    return 'Открыта';
                case (TaskStatusEnum::IN_PROGRESS):
                    return 'В работе';
                case (TaskStatusEnum::COMPLETED):
                    return 'Завершена';
                case (TaskStatusEnum::CANCELED):
                    return 'Отменена';
            }
        }

        public function assignee()
        {
            return $this->hasMany(TaskAssignee::class, 'task_id');
        }

        public function author() {
            return $this->belongsTo(User::class);
        }



    }
