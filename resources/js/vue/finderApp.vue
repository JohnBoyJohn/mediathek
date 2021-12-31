<template>
    <div class="">
        <div class="spinner-bg" v-show="showSpinner" />
        <div class="spinner" v-show="showSpinner">
            <fade-loader :loading="showSpinner" color="#acf" size="50px"></fade-loader>
        </div>
        <finder-form :lang="lang" />
        <result 
            :lang="lang"
            :invalid-api-string="invalidApiString"
        />
    </div>
</template>

<script>
import FinderForm from './finder/Form.vue';
import Result from './finder/Result.vue';
import FadeLoader from 'vue-spinner/src/FadeLoader.vue'

export default {
    name: "Finder-App",
    props: ['lang', 'invalidApiString'],
    components: {
        FinderForm,
        Result,
        FadeLoader,
    },
    computed: {
        showSpinner () {
            return this.$store.state.showAjaxSpinner;
        }
    }
}
</script>

<style scoped>
.spinner-bg {
    position: absolute;
    top: 0; 
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #777;
    opacity: 0.3;
    z-index: 9999;
}
.spinner {
    position: absolute;
    top: calc(50% - 35px);
    left: calc(50% - 35px);
    background: #fff;
    opacity: 1;
    padding: 40px 45px;
    border-radius: 5px;
    z-index: 9999;
    width: 100px;
    height: 100px;
}
</style>