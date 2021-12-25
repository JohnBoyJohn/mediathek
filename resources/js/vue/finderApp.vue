<template>
    <div class="row mt-4">
        <sidebar :routes="routes"></sidebar>
        <finder-form :lang="lang"></finder-form>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue';
import FinderForm from './finder/form.vue';

export default {
    name: "Finder-App",
    props: ['routes', 'lang'],
    components: {
        Sidebar,
        FinderForm,
    }
}
</script>