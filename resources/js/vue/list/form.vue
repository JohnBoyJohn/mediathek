<template>
    <div class="movie-list my-3">
        <div class="header row mb-2">
            <div class="col-4">
                {{ lang.list.table.header.title }}
            </div>
            <div class="col-4">
                {{ lang.list.table.header.genre }}
            </div>
            <div class="col-2">
                {{ lang.list.table.header.released }}
            </div>
            <div class="col-2">
                {{ lang.list.table.header.runtime }}
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
    props: ['movies', 'lang'],
}
</script>

<style scoped>
.header > div {
    font-weight: bold;
    font-size: 1.15rem;
}

.header,
.movie-wrapper {
    padding: 0 10px;
}

.movie-list > .movie-wrapper {
    background: #eee;
}
.movie-list > .movie-wrapper:nth-child(odd) {
    background: #ddd;
}
</style>