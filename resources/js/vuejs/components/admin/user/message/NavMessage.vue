<template>
    <div class="submit text-center">
        <router-link :to="{ name: 'messages.index' }" class="btn btn-primary btn-raised" append>
          <span class="btn-label">
               <i class="material-icons">email</i>
           </span>
            <b>My Messages</b>
        </router-link>
        <router-link :to="{ name: 'messages.send' }" class="btn btn-primary btn-raised" append>
          <span class="btn-label">
               <i class="material-icons">forum</i>
           </span>
            <b>Message send</b>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "NavMessage",
    }
</script>

<style scoped>

</style>