<template>
    <div class="container px-2">
        <h2 class="mt-3 mb-4">
            {{ lang.details.title }}

            <span class="float-end">
                <i class="fs-4 bi-eye"></i>
                {{ watched }}
            </span>
            <span class="clear-both"></span>
        </h2>
        <details-table :lang="lang" :movie="movie" />
    </div>
</template>

<script>
import DetailsTable from './detail/Table.vue';

export default {
    name: "Details-App",
    props: ['lang', 'movie', 'watched'],
    components: {
        DetailsTable,
    }
}
</script>