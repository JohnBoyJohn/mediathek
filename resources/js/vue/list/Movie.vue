<template>
    <div class="movie row py-2" @click="showDetails">
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
        showDetails () {
            console.log('show details from movie.id ' + this.movie.id);
            window.location.href = '/movie/' + this.movie.id;
        }
    },
}
</script>

<style scoped>
.movie {
    cursor: pointer;
}
</style>