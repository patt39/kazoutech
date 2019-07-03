<template>
    <div class="wrapper wrapper-full-page">
        <div class="page-header error-page header-filter" style="background-image:  url('/assets/img-error/error-404.jpg')">
            <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
            <div class="content-center">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title">404</h1>
                        <h2>Page not found :(</h2>
                        <h4>Ooooups! Looks like you got lost.</h4>
                    </div>
                </div>
            </div>
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import FooterAdmin from "../admin/FooterAdmin";
    export default {
        name: "Error404",
        components: {FooterAdmin}
    }
</script>

<style scoped>

</style>