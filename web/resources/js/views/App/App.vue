<template>
    <div class="page-container">
        <md-app>
            <md-app-content>
                <top-toolbar></top-toolbar>
                <breadcrumb></breadcrumb>
                <router-view></router-view>
                <create-task-form></create-task-form>
            </md-app-content>
        </md-app>
    </div>
</template>
<script>
    import TopToolbar from "../components/TopToolbar/TopToolbar";
    import Breadcrumb from "../components/Breadcrumb/Breadcrumb";
    import CreateTaskForm from "../components/Task/CreateTaskForm";
    export default {
        components: {
            Breadcrumb,
            TopToolbar,
            CreateTaskForm
        }
    }
</script>
