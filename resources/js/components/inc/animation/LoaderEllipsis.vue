<template>
    <div class="text-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="loading">Please wait a moment ...</div>
    </div>
</template>

<script>
    export default {
        name: "LoaderEllipsis"
    }
</script>

<style scoped>
    .loading {
        font-size: 16px;
        font-weight: 400;
        color: black;
    }
</style>