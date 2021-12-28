import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        count: 0,
        searchResult: {},
    },
    mutations: {
        increment (state) {
            state.count++
        },
        setSearchResult (state, payload) {
            console.log(payload);
            state.searchResult = payload;
        }
    },
});

export default store;