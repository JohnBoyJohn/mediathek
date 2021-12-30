import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        searchResult: {},
    },
    mutations: {
        setSearchResult (state, payload) {
            state.searchResult = payload;
        }
    },
});

export default store;
