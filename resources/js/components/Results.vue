<template>
    <div>
        <filters></filters>
        <Flipper :flip-key="flipKey" class="flex flex-wrap -mx-3">
            <div v-for="item in $store.getters.filteredResults" :key="item.id" class="w-full md:w-1/2 px-3 mb-6">
                <Flipped :flip-id="item.id.toString()" class="bg-gray-800 p-6 rounded">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6">
                            <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                                <img class="block mx-auto h-48 md:h-24 lg:h-32 rounded" v-lazy="item.image" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <div class="text-xl">
                                    <a :href="item.url" target="_blank" :title="item.name">{{ item.name }}</a>
                                </div>
                                <div class="text-gray-600 text-sm">Sold by <a :href="item.vendor.url" target="_blank" :title="item.vendor.name">{{ item.vendor.name }}</a></div>
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
    export default {
        components: { Filters, Flipped, Flipper },
        name: 'results',
        props: ['items'],
        mounted() {
            this.$store.commit('set_results', this.items);
        },
        computed: {
            flipKey () {
                return this.$store.getters.filteredResults.map((item) => item.id).join('');
            }
        }
    }
</script>
