<?php

    use App\Enums\TaskStatusEnum;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTaskStatusesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('task_statuses', function (Blueprint $table) {
                $table->unsignedBigInteger('assignee_id');
                $table->foreign('assignee_id',
                    'ts_assignee_id_fk')->references('id')->on('task_assignees')->onDelete('restrict');
                $table->enum('status', TaskStatusEnum::getValues())->default(TaskStatusEnum::IN_PROGRESS);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('task_statuses');
        }
    }
