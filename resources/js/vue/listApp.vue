<template>
    <div class="container px-2">
        <h2 class="my-3">{{ lang.list.title }}</h2>
        <list-form :movies="movies"></list-form>
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