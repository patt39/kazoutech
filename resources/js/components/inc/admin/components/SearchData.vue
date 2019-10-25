<template>
    <div class="toolbar">
        <div class="submit text-center" >
            <div class="col-md-6 col-sm-auto col-lg-auto">
                <div class="card card-form-horizontal">
                    <div class="card-body ">
                        <form method="" action="">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group bmd-form-group">
                                        <input @keyup.enter="searchit" type="text" value="" placeholder="Name or username email..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success" @click="search">
                                        <i class="material-icons">youtube_searched_for</i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AlertPermission",
        data() {
            return {
                search: ''
            }
        },
        methods:{
            searchit(){
                Fire.$emit('searching');
            }
            //searchit: _.debounce(() => {
            //    Fire.$emit('searching');
            //},1000),
//
            //printme() {
            //    window.print();
            //}
        },
        created() {}
    }
</script>

<style scoped>

</style>
