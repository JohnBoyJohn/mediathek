import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        searchResult: {},
        alreadySaved: false,
        showAjaxSpinner: false,
    },
    mutations: {
        setSearchResult (state, payload) {
            state.searchResult = payload.data;
            state.alreadySaved = payload.saved;
        },
        setShowAjaxSpinner (state, payload) {
            state.showAjaxSpinner = payload;
        },
        setAlreadySaved(state) {
            state.alreadySaved = true;
        },
    },
});

export default store;
