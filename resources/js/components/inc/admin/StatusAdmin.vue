<template>
<div>
    <div v-for="role in user.roleUser" class="submit">
        <div class="text-center">
            <button :class="getRoleName(role)">
                <i class="material-icons">supervisor_account</i>
                <b>{{role}}</b>
            </button>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "StatusAdmin",
        data() {
            return {
                user: {},
            }
        },
        methods:{
            getRoleName(role) {
                if (role == 'super-admin') {
                    return 'btn btn-info btn-raised btn-lg btn-round';
                }
                if (role == 'admin') {
                    return 'btn btn-success btn-raised btn-lg btn-round';
                }
                if (role == 'visitor') {
                    return 'btn btn-secondary btn-raised btn-lg btn-round';
                }
                if (role == 'editor') {
                    return 'btn btn-warning btn-raised btn-lg btn-round';
                }
                if (role == 'advertiser') {
                    return 'btn btn-danger btn-raised btn-lg btn-round';
                }
                if (role == 'moderator') {
                    return 'btn btn-primary btn-raised btn-lg btn-round';
                }
            },
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
        }
    }
</script>

<style scoped>

</style>