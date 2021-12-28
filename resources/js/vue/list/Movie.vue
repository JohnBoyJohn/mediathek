<template>
    <div class="movie row">
        <div class="col-4">
            {{ movie.title }}
        </div>
        <div class="col-3">
            {{ movie.genre }}
        </div>
        <div class="col-2">
            {{ releaseDate }}
        </div>
        <div class="col-1">
            {{ movie.runtime }}
        </div>
        <div class="col-2">
            buttons
        </div>
    </div>
</template>

<script>
export default {
    name: 'Movie',
    props: ['movie'],
    computed: {
        releaseDate () {
            const rDate = new Date(this.movie.released);
            if (rDate) {
                let year = rDate.getFullYear();
                let month = rDate.getMonth();
                let day = rDate.getDay();
                return `${day}.${month}.${year}`;
            }
            return this.movie.released;
        }
    },
    methods: {
        markAsWatched () {

        }
    }
}
</script>