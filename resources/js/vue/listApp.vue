<template>
    <div class="row mt-4">
        <sidebar :routes="routes"></sidebar>
        <list-form></list-form>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue';
import ListForm from './list/form.vue';

export default {
    name: "List-App",
    props: ['routes'],
    components: {
        Sidebar,
        ListForm,
    }
}
</script>