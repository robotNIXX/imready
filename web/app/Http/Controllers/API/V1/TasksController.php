<?php


    namespace App\Http\Controllers\API\V1;


    use App\Repositories\Criterias\CustomerTasksCriteria;
    use App\Repositories\TasksRepository;
    use App\Transformers\TasksTransformer;

    /**
     * Class TasksController
     *
     * @package App\Http\Controllers\API\V1
     */
    class TasksController extends APIController
    {
        protected $tasksRepository;

        /**
         * TasksController constructor.
         *
         * @param  TasksRepository  $tasksRepository
         */
        public function __construct(TasksRepository $tasksRepository)
        {
            $this->tasksRepository = $tasksRepository;
        }

        public function customerTasks()
        {
            $user = \Auth::user();
            $this->tasksRepository->pushCriteria(new CustomerTasksCriteria($user->id));
            $customerTasks = $this->tasksRepository->all();
            $this->tasksRepository->popCriteria(CustomerTasksCriteria::class);

            return $this->response->collection($customerTasks, new TasksTransformer);
//            $customerTasks =
        }
    }
