<template>
    <div class="bg-gray-800 rounded p-4 flex flex-col justify-between w-full">
        <div class="lg:flex lg:flex-row">
            <div class="mb-4 sm:w-3/4 lg:w-auto sm:mx-auto lg:m-0 lg:mr-6">
                <a :href="product.url" :title="product.name" rel="noopener" target="_blank">
                    <img v-lazy="product.image" class="object-cover h-48 w-full lg:w-32 lg:h-32 rounded bg-white" :alt="product.name">
                </a>
            </div>
            <div class="lg:flex lg:flex-col lg:justify-between">
                <div class="mb-4 lg:mb-0">
                    <a :href="product.url" :title="product.name" rel="noopener" class="text-xl font-semibold underline">
                        {{ product.name }}
                    </a>
                    <a :href="product.vendor.url" rel="noopener" :title="product.vendor.name" class="text-sm hover:underline text-purple-500 hidden lg:block">
                        {{ product.vendor.name }}
                    </a>
                </div>
                <div class="lg:mt-4">
                    <div class="flex items-center justify-between lg:justify-start">
                        <div class="lg:mr-4">
                            <span class="font-bold text-lg">{{(product.price / 100).toFixed(2) }} $</span>
                        </div>
                        <div v-if="product.in_stock">
                            <span class="inline-block mr-auto bg-green-200 text-green-700 rounded-full text-sm px-2">In Stock</span>
                        </div>
                        <div v-else>
                            <span class="inline-block mr-auto bg-red-200 text-red-700 rounded-full text-sm px-2">Out of Stock</span>
                        </div>
                    </div>
                    <a :href="product.vendor.url" rel="noopener" :title="product.vendor.name" class="text-sm hover:underline text-purple-500 lg:hidden">
                        {{ product.vendor.name }}
                    </a>
                </div>
            </div>
        </div>
        <div v-show="product.vendor.coupons.length" class="flex flex-col space-y-2 mt-4">
            <Coupon v-for="coupon in product.vendor.coupons" :key="coupon.id" :item="coupon"/>
        </div>
    </div>
</template>

<script>
    import Coupon from "./Coupon";

    export default {
        props: ['product'],
        name: "ProductCard",
        components: {Coupon},
        computed: {
            price() {
                return (this.product.price / 100).toFixed(2)
            }
        }
    }
</script>

