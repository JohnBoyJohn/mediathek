<template>
    <div class="" v-show="result.title != ''">
        <h2>Suchergebnis</h2>

        <div class="result row">
            <div class="img-responsible col-4">
                <img class="" :src="result.poster" :alt="result.title">
            </div>

            <div class="col-8">
                <div class="d-block row">
                    <div class="d-inline col-6">
                        <span class="">
                            {{ result.title }}
                        </span>
                    </div>
                    <div class="d-inline col-2">
                        <span>
                            {{ result.released }}
                        </span>
                    </div>
                    <div class="d-inline col-2">
                        <span>
                            {{ result.runtime }}
                        </span>
                    </div>
                    <div class="d-inline col-2">
                        <input type="hidden" :value="csrfToken" name="_token">
                        <button class="btn btn-primary" @click="save">
                            {{ lang.search.watched }}
                        </button>
                    </div>
                </div>
                <div class="header d-block row">
                    <div class="col-12">
                        {{ result.plot }}
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
import SearchResult from './../../models/searchResult';

export default {
    name: "Finder-Result",
    props: ['lang'],
    computed: {
        result () {
            return new SearchResult(this.$store.state.searchResult);
        },
        csrfToken: () => {
            return document.querySelector('meta[name="csrf-token"]').content;
        },
    },
    methods: {
        save (event) {
            event.preventDefault();
            axios.post('/movie/store', this.result.rawData)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
}
</script>
