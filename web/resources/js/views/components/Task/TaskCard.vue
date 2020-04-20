<template>
    <md-card class="md-layout-item task">
        <div :class="statusClass" class="md-content task-status"></div>
        <md-card-header>
            <div class="md-title">{{ task.title }}</div>
        </md-card-header>

        <md-card-content>
            <div class="content-item">
                <label>Описание:</label>{{ task.description }}
            </div>
            <div class="content-item date-range">
                <label>Срок исполнения:</label>{{ task.date_start | moment("D MMM YYYY") }} - {{ task.date_end |
                moment("D MMM YYYY") }}
            </div>
        </md-card-content>

        <md-card-actions md-alignment="right">
            <md-button>
                <md-icon>details</md-icon>
            </md-button>
            <md-button>
                <md-icon>edit</md-icon>
            </md-button>
        </md-card-actions>
    </md-card>
</template>

<script>
    export default {
        name: "TaskCard",
        props: {
            task: {
                default: function () {
                    return {}
                },
                required: true,
                type: Object
            }
        },
        computed: {
            statusClass() {
                let app = this;
                let taskClasses = [
                    'task-open',
                    'task-in-progress',
                    'task-completed',
                    'task-cenceled'
                ]

                return taskClasses[app.task.status];
            }
        },
        methods: {
            getStatusClass: function () {

                return 'md-primary'
            }
        }
    }
</script>

<style scoped>

</style>
