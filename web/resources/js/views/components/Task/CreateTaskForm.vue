<template>
  <div class="button-create-task">
    <div class="button-block">
      <div class="create-task-button" @click="showForm()">
        <md-icon>
          add_circle
        </md-icon>
        <md-tooltip md-direction="top">Добавить задачу</md-tooltip>
      </div>
    </div>
    <md-dialog :md-active.sync="createTask" class="modal-create-task">
        <md-dialog-title>
            Создание задачи
        </md-dialog-title>
        <md-dialog-content>
            <form novalidate class="md-layout" @submit.prevent="saveTask" method="post">
                <div class="md-layout">
                    <md-field :class="messageClass">
                        <md-input v-model="task.title" name="title" type="text" placeholder="Название задачи"></md-input>
                        <span class="md-error" v-if="has_error && errors.title" v-for="error in errors.title">{{ error }}</span>
                    </md-field>
                    <md-field :class="messageClass">
                        <md-textarea v-model="task.description" name="description"placeholder="Описание задачи"></md-textarea>
                        <span class="md-error" v-if="has_error && errors.description" v-for="error in errors.description">{{ error }}</span>
                    </md-field>
                    <mb-field :class="messageClass">
                      <md-datepicker v-model="task.date_start">
                        <label>Выполнить с</label>
                      </md-datepicker>
                      <span class="md-error" v-if="has_error && errors.date_start" v-for="error in errors.date_start">{{ error }}</span>
                    </mb-field>
                    <mb-field :class="messageClass">
                      <md-datepicker v-model="task.date_end">
                        <label>Выполнить до</label>
                      </md-datepicker>
                      <span class="md-error" v-if="has_error && errors.date_end" v-for="error in errors.date_end">{{ error }}</span>
                    </mb-field>
                    <mb-field :class="messageClass">
                        <md-input v-model="task.price" name="price" type="text" placeholder="Стоимость задачи"></md-input>
                        <span class="md-info">Оставьте это полу пустым для договорной цены</span>
                        <span class="md-error" v-if="has_error && errors.price" v-for="error in errors.price">{{ error }}</span>
                    </mb-field>
                    <div class="md-layout md-alignment-top-right">
                        <md-button type="submit" class="md-primary" :disabled="sending">Сохранить</md-button>
                    </div>
                </div>
            </form>
        </md-dialog-content>
    </md-dialog>
  </div>
</template>

<script>
  export default {
    name: 'CreateTaskForm',
    data: () => ({
        createTask: false,
        sending: false,
        has_error: false,
        error: '',
        errors: {},
        success: false,
        hasMessages: false,
        task: {}
    }),
    computed: {
        messageClass() {
            return {
                'md-invalid': this.hasMessages
            }
        }
    },
    methods: {
      saveTask: function() {
        let app = this;
      },
      showForm: function() {
        this.createTask = true;
      },
      hideForm: function() {
        this.createTask = false;
      }
    }
  }
</script>
