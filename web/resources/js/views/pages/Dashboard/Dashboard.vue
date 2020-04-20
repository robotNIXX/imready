<template>
    <div class="md-layout profile-tasks">
      <div class="md-layout-item tasks-board">
        <h3>Мои заказы</h3>
        <div class="md-layout">
            <task-card v-for="task in authorTasks" :key="task.id" :task="task"></task-card>
        </div>
      </div>
      <div class="md-layout-item tasks-board">
        <h3>Выполняемые заказы</h3>
      </div>
      <div class="md-layout-item tasks-board">
        <h3>Будет интересно</h3>
      </div>
    </div>
</template>

<script>
    import TaskCard from "../../components/Task/TaskCard";
    export default {
        components: {TaskCard},
        mounted() {
        this.$store.dispatch('GET_AUTHOR_TASKS');
      },
      computed: {
        authorTasks() {
          return this.$store.getters.authorTasks
        }
      }
    };
</script>
