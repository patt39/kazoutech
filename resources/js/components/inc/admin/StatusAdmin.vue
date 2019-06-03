<template>
<div>
    <div v-if="user.role_user === 'super-admin'" class="submit">
        <div class="text-center">
            <button class="btn btn-info btn-raised btn-lg btn-round">
                <i class="material-icons">supervisor_account</i>
                <b>Super Admin</b>
            </button>
        </div>
    </div>
    <div v-if="user.role_user === 'admin'" class="submit text-center">
        <button class="btn btn-success btn-raised btn-lg btn-round">
            <i class="material-icons">supervisor_account</i>
            <b>Admin</b>
        </button>
    </div>
    <div v-if="user.role_user === 'editor'" class="submit text-center">
        <button class="btn btn-warning btn-raised btn-lg btn-round">
            <i class="material-icons">supervisor_account</i>
            <b>Editor</b>
        </button>
    </div>
    <div v-if="user.role_user === 'moderator'" class="submit text-center">
        <button class="btn btn-info btn-raised btn-lg btn-round">
            <i class="material-icons">supervisor_account</i>
            <b>Moderator</b>
        </button>
    </div>
    <div v-if="user.role_user === 'advertiser'" class="submit text-center">
        <button class="btn btn-danger btn-raised btn-lg btn-round">
            <i class="material-icons">supervisor_account</i>
            <b>Advertiser</b>
        </button>
    </div>
    <div v-if="user.role_user === 'visitor'" class="submit text-center">
        <button class="btn btn-primary btn-raised btn-lg btn-round">
            <i class="material-icons">supervisor_account</i>
            <b>Visitor</b>
        </button>
    </div>
</div>
</template>

<script>
    export default {
        name: "StatusAdmin"
    }
</script>

<style scoped>

</style>