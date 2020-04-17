<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTaskAssigneesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('task_assignees', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('assignee_id');
                $table->unsignedBigInteger('task_id');
                $table->integer('mark')->default(0);
                $table->foreign('assignee_id', 'ta_user_id_fk')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('task_id', 'ta_task_id_fk')->references('id')->on('tasks')->onDelete('cascade');
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
            Schema::dropIfExists('task_assignees');
        }
    }
