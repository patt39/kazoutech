<template>
    <div class="users-list">
        <ul>
            <li v-for="user in users" :key="user.id">
                <div class="avatar">
                    <img :src="item.avatar" :alt="user.name"/>
                </div>
                <div class="contact">
                    <p class="name">{{ user.name}}</p>
                    <p class="email">{{ user.email}}</p>
                </div>
            </li>
        </ul>

    </div>
</template>

<script>
    export default {
       props:{
           users:{
               type:Array,
               default:[]
           }
       }
    }
</script>

<style scoped>

</style>