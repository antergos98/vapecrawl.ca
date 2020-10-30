<template>
    <form action="/search" method="GET" @submit.prevent="onSubmit">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-5/6 mb-3 sm:mb-0">
                <div class="px-3">
                    <input ref="searchbar" type="text" class="w-full p-3 rounded outline-none text-gray-900"
                           placeholder='Search for products... (Press "/" to focus)' v-model="q" autofocus>
                </div>
            </div>
            <div class="w-full sm:w-1/6">
                <div class="px-3">
                    <button type="submit"
                            class="transition duration-200 ease-in-out bg-indigo-600 w-full hover:bg-indigo-700 focus:outline-none px-4 py-3 font-bold rounded">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import EventBus from "../event-bus";
    import fetchApi from "../fetchApi";

    export default {
        props: ['searchTerm'],
        data: () => ({
            q: '',
            searchTermCopy: ''
        }),
        mounted() {
            this.q = this.searchTerm;
            this.searchTermCopy = this.searchTerm;
            document.addEventListener('keydown', this.onKeydown);
        },
        methods: {
            onKeydown(e) {
                if (e.key === "/" && document.activeElement !== this.$refs.searchbar) {
                    e.preventDefault();
                    this.$refs.searchbar.focus();
                }
            },
            onSubmit() {
                if (this.q == this.searchTermCopy) {
                    this.$emit('searchStarted');
                    setTimeout(() => this.$emit('searchEnded'), 100);
                    return;
                }

                this.performSearch();
            },
            performSearch: function () {
                this.$emit('searchStarted');

                fetchApi('/search?q=' + this.q)
                    .then(response => response.json())
                    .then(response => {
                        EventBus.$emit('searched');
                        this.$store.commit('set_results', response.results);
                        if (this.q === "" || this.q === null) {
                            document.title = 'Results' + ' - Vapecrawl.ca';
                        } else {
                            document.title = `Results for ${this.q}` + ' - Vapecrawl.ca';
                        }
                        window.history.pushState({q: this.q}, '', '/search?q=' + this.q);
                    })
                    .catch(() => {
                        this.$store.commit('set_results', []);
                        this.$store.commit('set_filters', null);
                        this.$store.commit('set_sort', null);
                    })
                    .finally(() => {
                        this.$emit('searchEnded');
                        this.$store.commit('set_search_term', this.q);
                        this.searchTermCopy = this.q;
                        this.$store.commit('set_skip', 32);
                    });
            }
        }
    }
</script>

