<template>
    <div class="page-container">
        <md-app>
            <md-app-content>
                <top-toolbar></top-toolbar>
                <router-view></router-view>
            </md-app-content>
        </md-app>
    </div>
</template>
<script>
    import TopToolbar from "../components/TopToolbar/TopToolbar";
    export default {
        components: {
            TopToolbar
        }
    }
</script>
