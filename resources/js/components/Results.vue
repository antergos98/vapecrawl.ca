<template>
    <div>
        <div class="mb-3">
            <search-form :searchTerm="q" @showLoading="loading = true" @searchEnded="loading = false"/>
        </div>

        <filters/>

        <div v-if="loading" class="flex flex-wrap -mx-3 overflow-hidden mt-3 relative animate-pulse">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900"></div>
            <div v-for="i in 6" class="w-full sm:w-1/2 md:w-1/3 px-3 overflow-hidden mb-6 flex">
                <skeleton/>
            </div>
        </div>

        <div v-else class="flex flex-wrap -mx-3 overflow-hidden">
            <div v-for="item in filteredResults" class="w-full sm:w-1/2 md:w-1/3 px-3 overflow-hidden mb-6 flex">
                <product-card :product="item"/>
            </div>
        </div>

        <infinite-scroll v-if="results.length >= 30 && !loading"/>

        <div class="text-lg md:text-2xl text-center mt-6" v-if="!results.length">
            <p>Sorry, there is no results for '{{searchTerm}}'.</p>
        </div>
    </div>
</template>

<script>
    import Filters from './Filters';
    import Skeleton from "./Skeleton";
    import SearchForm from "./SearchForm";
    import InfiniteScroll from "./InfiniteScroll";
    import ProductCard from "./ProductCard";
    import {mapGetters, mapState} from "vuex";

    export default {
        components: {InfiniteScroll, ProductCard, Filters, Skeleton, SearchForm},
        props: ['items', 'q'],
        data() {
            return {
                loading: false
            }
        },
        mounted() {
            this.$store.commit('set_results', this.items);
            this.$store.commit('set_search_term', this.q);
        },
        computed: {
            ...mapState(['searchTerm', 'results']),
            ...mapGetters(['filteredResults'])
        }
    }
</script>
