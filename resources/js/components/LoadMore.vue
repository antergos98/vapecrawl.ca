<template>
    <div class="loading">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             class="h-12 w-12"
             style="margin: auto; background: none; display: block; shape-rendering: auto;"
             viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="4" r="35"
                    stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                                  values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
        </svg>
    </div>
</template>

<script>
    export default {
        name: "LoadMore",
        props: ['q'],
        data: () => ({
            observer: null
        }),
        mounted() {
            this.onScroll = this.onScroll.bind(this);
            window.addEventListener('scroll', this.onScroll);
        },
        beforeDestroy() {
            window.removeEventListener('scroll', this.onScroll);
        },
        methods: {
            onScroll() {
                const scrollY = window.scrollY
                const visible = document.documentElement.clientHeight
                const pageHeight = document.documentElement.scrollHeight
                const bottomOfPage = visible + scrollY >= pageHeight
                if (bottomOfPage || pageHeight < visible) {
                    this.loadMore();
                }
            },
            loadMore() {
                const options = {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                };

                const skip = this.$store.state.skip;

                let url = `/search?skip=${skip}`;

                if (this.$store.state) {
                    url += `&q=${this.q}`
                }

                fetch(url, options)
                    .then(response => response.json())
                    .then(response => {
                        this.$store.commit('add_results', response.results);
                        this.$store.commit('set_skip', this.$store.state.skip += 48);
                    });
            }
        }
    }
</script>
