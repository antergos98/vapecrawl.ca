<template>
    <div>
        <div v-show="searchFailed" class="bg-gray-800 p-4 rounded mb-3">
            <div class="flex items-center">
                <div class="mr-3">
                    <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 5h2v6H9V5zm0 8h2v2H9v-2z"/></svg>
                </div>
                <div>
                    Something went wrong with your search. Please try to refresh the page.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <form action="/search" method="GET" @submit.prevent="onSubmit">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full sm:w-5/6 mb-3 sm:mb-0">
                        <div class="px-3">
                            <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                                   placeholder="Search for products..." v-model="searchTerm" required autofocus>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/6">
                        <div class="px-3">
                            <button type="submit" class="bg-gray-800 py-3 rounded w-full hover:bg-gray-700">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <filters></filters>
        <Flipper :flip-key="flipKey" class="flex flex-wrap -mx-3">
            <div v-for="item in $store.getters.filteredResults" :key="item.id" class="w-full md:w-1/2 px-3 mb-6">
                <Flipped :flip-id="item.id.toString()" class="bg-gray-800 p-6 rounded">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                                <a :href="item.url + '?ref=vapecrawl.ca'" rel="noopener" target="_blank" :title="item.name">
                                    <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" v-lazy="item.image" :alt="item.name">
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <div class="text-xl">
                                    <a :href="item.url + '?ref=vapecrawl.ca'" rel="noopener" target="_blank" :title="item.name" class="hover:underline">{{ item.name }}</a>
                                </div>
                                <div class="text-gray-600 text-sm">Sold by <a rel="noopener" :href="item.vendor.url + '?ref=vapecrawl.ca&rel=noopener'" target="_blank" class="hover:underline" :title="item.vendor.name">{{ item.vendor.name }}</a></div>
                            </div>
                            <div class="flex">
                                <div class="text-lg mr-3">
                                    {{ (item.price / 100).toFixed(2) }} $
                                </div>
                                <div>
                                    <span v-if="item.in_stock" class="inline-block bg-green-200 text-green-700 rounded-full text-xs px-2">In Stock</span>
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
    import EventBus from '../event-bus';

    export default {
        components: { Filters, Flipped, Flipper },
        name: 'results',
        props: ['items', 'q'],
        data () {
            return {
                searchTerm: '',
                searchFailed: false
            }
        },
        mounted() {
            this.$store.commit('set_results', this.items);
            if (this.q) {
                this.searchTerm = this.q;
            }
        },
        methods: {
            onSubmit () {
                axios.get('/search?q=' + this.searchTerm)
                .then(response => {
                    EventBus.$emit('searched');
                    document.activeElement.blur();
                    this.searchFailed = false;
                    this.$store.commit('set_results', response.data.results);
                    document.title = this.searchTerm + ' - Vapecrawl';
                    window.history.pushState({q: this.searchTerm}, '', '/search?q=' + this.searchTerm);
                })
                .catch(() => {
                    this.$store.commit('set_results', []);
                    this.$store.commit('set_filters', null);
                    this.$store.commit('set_sort', null);
                    this.searchFailed = true;
                })
            }
        },
        computed: {
            flipKey () {
                return this.$store.getters.filteredResults.map((item) => item.id).join('');
            }
        }
    }
</script>
