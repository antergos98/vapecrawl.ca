<template>
    <div>
        <LoadingOverlay v-if="loading"/>
        <div class="mb-3">
            <SearchForm :searchTerm="q" @searchStarted="loading = true" @searchEnded="loading = false"/>
        </div>
        <Filters/>
        <Flipper :flip-key="flipKey" class="flex flex-wrap -mx-3">
            <div v-for="item in $store.getters.filteredResults" :key="item.id" class="w-full md:w-1/2 px-3 mb-6">
                <Flipped :flip-id="item.id.toString()" class="bg-gray-800 p-6 rounded">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                                <a :href="item.url + '?ref=vapecrawl.ca'" rel="noopener" target="_blank"
                                   :title="item.name">
                                    <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" v-lazy="item.image"
                                         :alt="item.name">
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <div class="text-xl">
                                    <a :href="item.url + '?ref=vapecrawl.ca'" rel="noopener" target="_blank"
                                       :title="item.name" class="hover:underline">{{ item.name }}</a>
                                </div>
                                <div class="text-gray-600 text-sm">Sold by <a rel="noopener"
                                                                              :href="item.vendor.url + '?ref=vapecrawl.ca&rel=noopener'"
                                                                              target="_blank" class="hover:underline"
                                                                              :title="item.vendor.name">
                                    {{ item.vendor.name }}</a></div>
                            </div>
                            <div class="flex">
                                <div class="text-lg mr-3">
                                    {{ (item.price / 100).toFixed(2) }} $
                                </div>
                                <div>
                                    <span v-if="item.in_stock"
                                          class="inline-block bg-green-200 text-green-700 rounded-full text-xs px-2">In Stock</span>
                                    <span v-else class="inline-block bg-red-200 text-red-700 rounded-full text-xs px-2">Out of Stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </Flipped>
            </div>
        </Flipper>
        <div class="text-lg md:text-2xl text-center mt-6" v-if="$store.getters.filteredResults.length === 0">
            <p>Sorry, there is no results based on your keywords and/or filters. 😨</p>
        </div>
    </div>
</template>

<script>
    import Filters from './Filters';
    import {Flipper, Flipped} from 'vue-flip-toolkit';
    import LoadingOverlay from "./LoadingOverlay";
    import SearchForm from "./SearchForm";

    export default {
        components: {Filters, Flipped, Flipper, LoadingOverlay, SearchForm},
        name: 'results',
        props: ['items', 'q'],
        data() {
            return {
                loading: false
            }
        },
        mounted() {
            this.$store.commit('set_results', this.items);
        },
        computed: {
            flipKey() {
                return this.$store.getters.filteredResults.map((item) => item.id).join('');
            }
        }
    }
</script>
