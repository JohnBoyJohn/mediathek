<template>
    <div class="container px-2">
        <h2 class="mt-3 mb-4">
            {{ lang.list.title }}
        </h2>
        <list-form :movies="movies" :lang="lang" />
    </div>
</template>

<script>
import ListForm from './list/form.vue';

export default {
    name: "List-App",
    props: ['lang', 'movies'],
    components: {
        ListForm,
    }
}
</script>