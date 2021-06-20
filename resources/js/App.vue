<template>
    <div>

        <Spinner v-if="loading"></Spinner>
        <div v-else="initiate">
            <router-view :app="this"></router-view>
        </div>

    </div>
</template>

<script>

import Spinner from 'vue-simple-spinner'

export default {
    name: 'App',
    components: {
        Spinner: Spinner
    },
    data() {
        return {
            user: null,
            loading: false,
            initiate: false,
            req: axios.create({
                baseUrl: this.BASE_URL
            })
        }
    },
    created() {
        this.init();
    },
    methods: {
        init: function () {


                this.loading = false;
                this.initiate = true;

        }
    }
}
</script>

<style>
    body{
        background: #070732 !important;
    }
</style>

