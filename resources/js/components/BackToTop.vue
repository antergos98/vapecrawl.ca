<template>
    <div @click="scrollToTop" ref="backToTop"
         class="transition duration-200 ease-in-out fixed z-40 p-3 bg-purple-600 hover:bg-purple-700 rounded-full shadow cursor-pointer"
         style="bottom: 20px; right: 20px; display: none;">
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                  clip-rule="evenodd"></path>
        </svg>
    </div>
</template>

<script>
    export default {
        mounted() {
            window.addEventListener('scroll', this.onScroll);
            window.smoothscroll = () => {
                let currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
                if (currentScroll > 0) {
                    window.requestAnimationFrame(window.smoothscroll);
                    window.scrollTo(0, Math.floor(currentScroll - (currentScroll / 5)));
                }
            }
        },
        destroyed () {
            window.removeEventListener('scroll', this.onScroll);
        },
        methods: {
            onScroll() {
                if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                    this.$refs.backToTop.style.display = "block";
                } else {
                    this.$refs.backToTop.style.display = "none";
                }
            },
            scrollToTop() {
                window.smoothscroll();
            }
        }
    }
</script>

<style scoped>

</style>
