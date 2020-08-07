<template>
    <div>
        <BackToTop/>
        <LoadingOverlay v-if="loading"/>
        <div class="mb-3">
            <SearchForm :searchTerm="q" @searchStarted="loading = true" @searchEnded="loading = false"/>
        </div>
        <Filters/>
        <div class="flex flex-wrap -mx-3 overflow-hidden">
            <div v-for="item in $store.getters.filteredResults" :key="item.id" class="w-full md:w-1/2 px-3 mb-6 flex items-stretch">
                <div class="bg-gray-800 p-6 rounded flex-1 flex items-center">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6 lg:w-32 h-full overflow-hidden">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full relative">
                                <div v-if="!item.in_stock"
                                     class="absolute inset-0 rounded font-bold text-center flex items-center justify-center"
                                     style="background-color: rgba(26, 32, 44, 0.5);">
                                    <span class="text-lg">Out of Stock</span>
                                </div>
                                <a :href="item.url" rel="noopener" target="_blank"
                                   :title="item.name">
                                    <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" v-lazy="item.image"
                                         :alt="item.name">
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div class="mb-4">
                                <div class="text-lg font-semibold mb-1">
                                    <a :href="item.url" rel="noopener" target="_blank"
                                       :title="item.name" class="hover:underline">{{ item.name }}</a>
                                </div>
                                <div class="text-gray-400 text-sm">
                                    Sold by
                                    <a rel="noopener" :href="item.vendor.url"
                                       target="_blank" class="hover:underline text-purple-300"
                                       :title="item.vendor.name">
                                        {{ item.vendor.name }}
                                    </a>
                                </div>
                            </div>
                            <div class="text-lg" :class="{'mb-2': item.vendor.coupons.length}">
                                <span>{{ (item.price / 100).toFixed(2) }} $</span>
                            </div>
                            <div v-show="item.vendor.coupons.length" class="flex flex-wrap -mx-1">
                                <div class="px-1 mb-1" v-for="coupon in item.vendor.coupons">
                                    <Coupon :item="coupon"></Coupon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    import Coupon from "./Coupon";

    export default {
        components: {InfiniteScroll, Filters, Coupon, BackToTop, LoadingOverlay, SearchForm},
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
