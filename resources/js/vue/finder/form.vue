<template>
    <div class="col-9 border bg-light">
        <h2>{{ lang.search.title }}</h2>

        <form method="post" action="/search" @submit="send">
            <input type="hidden" :value="csrfToken" name="_token">

            <div class="row">
                <div class="col-6">
                    <label for="title" class="form-label">
                        {{ lang.search.movieTitle }}
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="title" v-model="title" class="form-control" id="title" aria-describedby="emailHelp" required>
                </div>

                <div class="col-3">
                    <label for="year" class="form-label">
                        {{ lang.year }}
                    </label>
                    <select v-model="year" name="year" class="form-select" id="year">
                        <option value="" selected>{{ lang.selectDefault }}</option>
                        <template v-for="date in dateSelectionRange">
                            <option :value="date" :key="date">
                                {{ date }}
                            </option>
                        </template>
                    </select>
                </div>

                <div class="col-3">
                    <label for="type" class="form-label">
                        {{ lang.search.type.label }}
                    </label>
                    <select v-model="type" name="type" class="form-select" id="type">
                        <option value="" selected>{{ lang.selectDefault }}</option>
                        <option value="movie">{{ lang.search.type.movie }}</option>
                        <option value="series">{{ lang.search.type.series }}</option>
                        <option value="episode">{{ lang.search.type.episode }}</option>
                    </select>
                </div>

                <div class="col-12 form-text mb-3">
                    {{ lang.requiredField }}
                </div>
            </div>
            
            <div class="row">
                <div class="col-4 mb-3">
                    <button type="submit" class="btn btn-primary">
                        {{ lang.search.submit }}
                    </button>
                </div>
            </div>
        </form>

        <div class="" v-show="searchResult">
            <h2>Suchergebnis</h2>

            <template v-for="(value, index) in searchResult">
                <div v-if="index == 'Poster'" class="row" :key="index">
                    <img class="" :src="value" :alt="searchResult.title">
                </div>

                <div    
                    v-else-if="index == 'Ratings'"
                    class="row"
                    v-for="(rating, indexRating) in value"
                    :key="index + '-' + rating"
                >
                    <div class="col-6 h-100">
                        <template v-if="!indexRating">
                            {{ index }}:
                        </template>
                    </div>
                    <div class="col-6">
                        {{ rating.Source }}: {{ rating.Value }}
                    </div>
                </div>

                <div v-else class="row" :key="index">    
                    <div class="col-6">
                        {{ index }}:
                    </div>

                    <div class="col-6">
                        {{ value }}
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    name: "Finder-Form",
    data: () => {
        return {
            title: '',
            year: '',
            type: '',
            searchResult: null,
        };
    },
    props: ['lang'],
    computed: {
        csrfToken: () => {
            return document.querySelector('meta[name="csrf-token"]').content;
        },
        dateSelectionRange: () => {
            let range = [];
            let today = new Date().getFullYear();
            for (let i = 1970; i <= today; i++) {
                range.push(i);
            }
            return range;
        }
    },
    methods: {
        send: function (event) {
            event.preventDefault();
            let data = {
                title: this.title,
                year: this.year,
                type: this.type,
            }

            console.log(data);
            
            axios.post('/search', data)
                .then(response => {
                    console.log(response.data);
                    this.searchResult = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>