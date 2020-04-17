<?php

    use App\Enums\TaskPriorityEnum;
    use App\Enums\TaskStatusEnum;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTasksTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->unsignedBigInteger('author_id');
                $table->enum('priority', TaskPriorityEnum::getValues())->default(TaskPriorityEnum::LOW);
                $table->float('price')->nullable();
                $table->date('date_start')->nullable();
                $table->date('date_end')->nullable();
                $table->time('time_start')->nullable();
                $table->time('time_end')->nullable();
                $table->unsignedBigInteger('building_id');
                $table->foreign('building_id',
                    'tasks_building_id_fk')->references('id')->on('buildings')->onDelete('restrict');
                $table->foreign('author_id', 'tasks_author_id_fk')->references('id')->on('users')->onDelete('cascade');
                $table->enum('status', TaskStatusEnum::getValues())->default(TaskStatusEnum::CREATED);
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
            Schema::dropIfExists('tasks');
        }
    }
