<template>
    <div>
        <div class="alert alert-danger alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
            <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AlertPermission",
        data() {
        return {
            user: {},
        }
    },
    methods:{},
    created() {}
    }
</script>

<style scoped>

</style>