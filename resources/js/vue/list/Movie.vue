<template>
    <div class="movie">
        <a :href="'/movie/' + movie.id" class="row py-2">
            <div class="col-4">
                {{ movie.title }}
            </div>
            <div class="col-4">
                {{ movie.genre }}
            </div>
            <div class="col-2">
                {{ releaseDate }}
            </div>
            <div class="col-2">
                {{ movie.runtime }}
            </div>
        </a>
    </div>
</template>

<script>
export default {
    name: 'Movie',
    props: ['lang', 'movie', 'invalidApiString'],
    computed: {
        releaseDate () {
            let releaseDate = this.movie.released;

            if (releaseDate && releaseDate != this.invalidApiString) {
                const date = releaseDate.split('-');
                return date[2] + '.' + date[1] + '.' + date[0];
            }

            return this.invalidApiString;
        }
    },
}
</script>

<style scoped>
.movie {
    cursor: pointer;
}

.movie a {
    text-decoration: none;
    color: var(--bs-body-color);
}
</style>