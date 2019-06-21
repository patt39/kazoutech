<template>
    <div class="chat-app">
        <Conversation :user="selectedUser" :message="messages"/>
        <UserList :users="users"/>
    </div>
</template>

<script>
    import Conversation from "./Conversation";
    import UserList from "./UserList";
    export default {
        components: {UserList, Conversation},
        data() {
            return {
                selectedUser: null,
                messages:[],
                users: [],

            }

        },

        mounted() {
            console.log(this.user);
            axios.get("/api/users").then(response => {
                console.log(response.data);
                this.users = response.data.data;
            });
        }
    }
</script>

<style scoped>

</style>