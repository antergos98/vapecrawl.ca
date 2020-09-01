<template>
    <div>
        <BackToTop/>
        <LoadingOverlay v-if="loading"/>
        <div class="mb-3">
            <SearchForm :searchTerm="q" @searchStarted="loading = true" @searchEnded="loading = false"/>
        </div>
        <Filters/>
        <div class="flex flex-wrap -mx-3 overflow-hidden">
            <div v-for="item in $store.getters.filteredResults" class="w-full sm:w-1/2 px-3 overflow-hidden mb-6 flex">
                <ProductCard :product="item"/>
            </div>
        </div>

        <InfiniteScroll v-if="$store.state.results.length >= 32"/>

        <div class="text-lg md:text-2xl text-center mt-6" v-if="$store.getters.filteredResults.length === 0">
            <p>Sorry, there is no results based on your keywords and/or filters. 😨</p>
        </div>
    </div>
</template>

<script>
    import Filters from './Filters';
    import LoadingOverlay from "./LoadingOverlay";
    import SearchForm from "./SearchForm";
    import BackToTop from "./BackToTop";
    import InfiniteScroll from "./InfiniteScroll";
    import ProductCard from "./ProductCard";

    export default {
        components: {InfiniteScroll, ProductCard, Filters, BackToTop, LoadingOverlay, SearchForm},
        name: 'results',
        props: ['items', 'q'],
        data() {
            return {
                loading: false
            }
        },
        mounted() {
            this.$store.commit('set_results', this.items);
            this.$store.commit('set_search_term', this.q);
        }
    }
</script>
