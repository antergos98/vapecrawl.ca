<template>
    <div>
        <div class="loading" v-if="show">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 class="h-12 w-12 m-auto bg-none block"
                 style="shape-rendering: auto;"
                 viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="4" r="35"
                        stroke-dasharray="164.93361431346415 56.97787143782138">
                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                                      values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                </circle>
            </svg>
        </div>
        <div v-else class="block text-center text-gray-500">
            You have reached the end of the list.
            <a class="underline" href="#" @click="window.scrollTo(0, 0);">Click here to scroll back up.</a>
        </div>
    </div>
</template>

<script>
    import fetchApi from "../fetchApi";

    export default {
        data: () => ({
            show: true
        }),
        mounted() {
            this.onScroll = this.onScroll.bind(this);
            this.initListener();
        },
        beforeDestroy() {
            this.destroyListener();
        },
        methods: {
            initListener() {
                window.addEventListener('scroll', this.onScroll);
            },
            destroyListener() {
                window.removeEventListener('scroll', this.onScroll);
            },
            onScroll() {
                const scrollY = window.scrollY;
                const visible = document.documentElement.clientHeight;
                const pageHeight = document.documentElement.scrollHeight - 250;
                const bottomOfPage = visible + scrollY >= pageHeight;
                if (bottomOfPage || pageHeight < visible) {
                    this.loadMore();
                }
            },
            loadMore() {
                this.destroyListener();
                const page = this.$store.state.page + 1;
                let url = `/search?page=${page}`;

                if (this.$store.state.searchTerm !== "" && this.$store.state.searchTerm !== null) {
                    url += `&q=${this.$store.state.searchTerm}`
                }

                fetchApi(url)
                    .then(response => response.json())
                    .then(response => {
                        this.$store.commit('set_results', this.$store.state.results.concat(response.results.data));
                        this.$store.commit('set_page', this.$store.state.page += 1)
                        if (response.results.data.length) {
                            this.initListener();
                            this.show = true;
                        } else {
                            this.destroyListener();
                            this.show = false;
                        }
                    });
            }
        }
    }
</script>
