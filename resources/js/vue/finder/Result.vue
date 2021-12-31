<template>
    <div class="mt-3" v-show="result.title != ''">
        <h2>{{lang.search.resultTitle}}</h2>

        <div class="result row mb-3">
            <div class="img-responsible col-4" v-show="showPoster">
                <img class="" v-if="showPoster" :src="result.poster" :alt="result.title">
            </div>

            <div :class="{'col-8': showPoster, 'col-12': !showPoster}">
                <div class="header row mb-3">
                    <div class="col-4">
                        <span>
                            {{ result.title }}
                        </span>
                    </div>
                    <div class="col-3">
                        <span>
                            {{ formatReleaseDate }}
                        </span>
                    </div>
                    <div class="col-2">
                        <span>
                            {{ checkForInvalidString('runtime', result.runtime) }}
                        </span>
                    </div>
                    <div class="col-3">
                        <input type="hidden" :value="csrfToken" name="_token">
                        <button 
                            class="btn float-end d-flex" 
                            :class="{'position-relative btn-success': saved, 'btn-primary': !saved}"
                            @click="save"
                        >
                            <span class="me-2">
                                {{ lang.search.watched }}
                            </span>
                            <span class="checkbox border rounded">
                                <i v-if="saved" class="bi bi-check-lg text-success"></i>
                            </span>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                </div>

                <div class="row errors" v-show="error">
                    <div class="col-12">
                        {{ lang.messages.error }}
                    </div>
                </div>

                <div class="content d-block row">
                    <div class="col-12">
                        {{ checkForInvalidString('plot', result.plot) }}
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
    props: ['lang', 'invalidApiString'],
    data () {
        return {
            error: null,
        };
    },
    computed: {
        result () {
            return new SearchResult(this.$store.state.searchResult);
        },
        saved () {
            return this.$store.state.alreadySaved;
        },
        csrfToken () {
            return document.querySelector('meta[name="csrf-token"]').content;
        },
        showPoster () {
            return this.result.poster !== this.invalidApiString;
        },

        formatReleaseDate () {
            let releaseDate = this.checkForInvalidString('released', this.result.released);
            if (this.result.released != this.invalidApiString) {
                let date = releaseDate.split(' ');
                releaseDate = date[0] + '. ' + date[1] + ' ' + date[2];
            }
            return releaseDate;
        },
    },
    methods: {
        save (event) {
            event.preventDefault();
            axios.post('/movie/store', this.result.rawData)
                .then(() => {
                    this.error = null;
                    this.$store.commit('setAlreadySaved');
                })
                .catch(error => {
                    this.error = error;
                });
        },
        checkForInvalidString (key, value) {
            return value != this.invalidApiString
                ? value
                : this.lang.search[key] + ': ' + this.invalidApiString;
        },
    },
}
</script>

<style scoped>
.btn-success .bi {
    position: absolute;
    font-size: 20px;
    top: 2px;
    right: 12px;
}

.checkbox {
    width: 20px;
    height: 20px;
    background-color: #fff;
    margin-top: 1px;
}
</style>
