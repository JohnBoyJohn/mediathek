<template>
    <div class="movie-list mb-3">
        <div class="header row mb-2">
            <div class="col-4">
                title
            </div>
            <div class="col-3">
                genre
            </div>
            <div class="col-2">
                released
            </div>
            <div class="col-1">
                runtime
            </div>
            <div class="col-2">
                buttons
            </div>
        </div>
        <div 
            class="movie-wrapper border-top py-2"
            v-for="movie in movies"
            :key="movie.imdbId"
        >
            <movie :movie="movie"></movie>
        </div>
    </div>
</template>

<script>
import Movie from './Movie';

export default {
    name: "List-Form",
    components: {
        Movie,
    },
    props: ['movies'],
}
</script>

<style scoped>
.header > div {
    font-weight: bold;
    font-size: 1.15rem;
}
</style>