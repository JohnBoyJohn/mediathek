<template>
    <div class="">
        <h2 class="my-3">{{ lang.search.title }}</h2>

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

            axios.post('/search', data)
                .then(response => {
                    this.$store.commit('setSearchResult', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>