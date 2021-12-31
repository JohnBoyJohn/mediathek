<template>
    <div class="details-table my-3">
        <div class="row header mb-4">
            <div class="image-wrapper col-3">
                <img class="col-12" :src="movie.poster" :alt="movie.title">
            </div>
            <div class="header-wrapper col-9">
                <div class="header row border-bottom">
                    <div class="col-4 pb-2">{{ movie.title }}</div>
                    <div class="col-4 pb-2">{{ movie.genre }}</div>
                    <div class="col-2 pb-2">{{ releaseDate }}</div>
                    <div class="col-2 pb-2">{{ movie.runtime }}</div>
                </div>

                <div class="col-12 mt-2">
                    {{ movie.plot }}
                </div>
            </div>
        </div>
        <div class="row content border-top pt-2">
            <div 
                class="col-6 mb-2"
                v-for="(value, index) in getBodyIndexes"
                :key="index"
            >
                <span>
                    {{ index }}: {{ value }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Details-Table",
    data () {
        return {
            headerIndexes: ['title', 'released', 'runtime', 'genre'],
            specialIndexes: ['plot', 'poster', 'ratings'],
            hiddenIndexes: ['id', 'imdbID', 'created_at', 'updated_at']
        };
    },
    props: ['lang', 'movie', 'invalidApiString'],
    computed: {
        getHeaderIndexes () {
            const indexes = Object.entries(this.movie);
            const filtered = indexes.filter(([key, value]) => {
                return this.headerIndexes.includes(key);
            }, this);

            return Object.fromEntries(filtered);
        },
        getBodyIndexes () {
            const indexes = Object.entries(this.movie);
            const filtered = indexes.filter(([key, value]) => {
                return !this.headerIndexes.includes(key)
                    && !this.specialIndexes.includes(key)
                    && !this.hiddenIndexes.includes(key);
            }, this);

            return Object.fromEntries(filtered);
        },
        releaseDate () {
            let releaseDate = this.movie.released;

            if (releaseDate != this.invalidApiString) {
                const date = releaseDate.split('-');
                releaseDate = date[2] + '.' + date[1] + '.' + date[0];
            } else {
                releaseDate = this.lang.search.released + ': ' + this.invalidApiString;
            }
            
            return releaseDate;
        },
    },
}
</script>
