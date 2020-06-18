import Vue from 'vue'
import Vuex from 'vuex'
import _orderBy from 'lodash/orderBy';
import _get from 'lodash/get';

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        results: [],
        sort: null,
        filters: null,
        searchTerm: null,
        page: 1
    },
    mutations: {
        set_results(state, payload) {
            state.results = payload;
        },
        set_sort(state, payload) {
            state.sort = payload;
        },
        set_filters(state, payload) {
            state.filters = payload;
        },
        set_search_term(state, payload) {
            state.searchTerm = payload;
        },
        set_page(state, payload) {
            state.page = payload
        }
    },
    getters: {
        filteredResults(state) {
            let filteredResults = state.results;

            if (state.filters) {
                const filterKeys = Object.keys(state.filters);
                filteredResults = filteredResults.filter(item => {
                    return filterKeys.every(key => {
                        if (Array.isArray(state.filters[key])) {
                            return state.filters[key].includes(_get(item, key));
                        }

                        return state.filters[key] == _get(item, key);
                    });
                });
            }

            if (state.sort) {
                filteredResults = _orderBy(filteredResults, state.sort.key, state.sort.direction);
            }

            return filteredResults;
        }
    }
});
