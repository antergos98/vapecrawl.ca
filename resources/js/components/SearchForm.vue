<template>
    <form action="/search" method="GET" @submit.prevent="onSubmit">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-5/6 mb-3 sm:mb-0">
                <div class="px-3">
                    <input type="text" class="w-full p-3 rounded outline-none text-gray-900"
                           placeholder="Search for products... (12 monkeys, Blotto RTA, Aegis, etc.)" v-model="q" required autofocus>
                </div>
            </div>
            <div class="w-full sm:w-1/6">
                <div class="px-3">
                    <button type="submit"
                            class="bg-purple-600 py-3 rounded w-full hover:bg-purple-700 focus:outline-none">Search
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import EventBus from "../event-bus";

    export default {
        props: ['searchTerm'],
        data: () => ({
            q: '',
            searchTermCopy: ''
        }),
        mounted() {
            this.q = this.searchTerm;
            this.searchTermCopy = this.searchTerm;
        },
        methods: {
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
                const options = {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                };

                fetch('/search?q=' + this.q, options)
                    .then(response => response.json())
                    .then(response => {
                        EventBus.$emit('searched');
                        this.$store.commit('set_results', response.results);
                        document.title = `Results for ${this.q}` + ' - Vapecrawl.ca';
                        window.history.pushState({q: this.q}, '', '/search?q=' + this.q);
                    })
                    .catch(() => {
                        this.$store.commit('set_results', []);
                        this.$store.commit('set_filters', null);
                        this.$store.commit('set_sort', null);
                    })
                    .finally(() => {
                        this.$emit('searchEnded');
                        this.searchTermCopy = this.q;
                    });
            }
        }
    }
</script>

