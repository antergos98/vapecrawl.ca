<template>
    <div class="bg-indigo-200 text-sm rounded-sm py-1 px-2 text-indigo-800 mr-auto inline-block">
        <div class="flex items-center">
            <div>
                <svg class="w-4 h-4 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                          clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                {{ item.description }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Coupon",
        props: ['item']
    }
</script>
