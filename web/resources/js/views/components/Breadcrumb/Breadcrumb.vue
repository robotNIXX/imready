<template>
    <div class="breadcrumb" v-if="breadcrumbList && breadcrumbList.length > 0">
        <ul>
            <li v-for="(breadcrumb, index) in breadcrumbList" :key="index" @click="routeTo(index)" :class="{'linked': !!breadcrumb.link}">
                <md-icon>double_arrow</md-icon> <span>{{ breadcrumb.name}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Breadcrumb",
        data: function () {
            return {
                breadcrumbList: []
            }
        },
        mounted() {
            this.updateList();
        },
        watch: {
            '$route'() {
                this.updateList();
            }
        },
        methods: {
            routeTo: function(pRouteTo) {
                if (this.breadcrumbList[pRouteTo].link) {
                    this.$router.push(this.breadcrumbList[pRouteTo].link);
                }

            },
            updateList: function() {
                this.breadcrumbList = this.$route.meta.breadcrumb;
            }
        }
    }
</script>

<style scoped>

</style>
