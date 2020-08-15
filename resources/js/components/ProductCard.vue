<template>
    <div class="bg-gray-800 rounded flex-1 flex p-4 items-center nner">
        <div class="flex flex-row">
            <div class="flex flex-shrink-0 mr-6 h-full">
                <div class="object-cover w-32 h-32 h-full">
                    <a :href="product.url" rel="noopener" target="_blank"
                       :title="product.name">
                        <img
                            class="h-32 rounded md:mx-auto" v-lazy="product.image"
                            :alt="product.name">
                    </a>
                </div>
            </div>
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <div class="text-lg font-semibold mb-1">
                        <a :href="product.url" rel="noopener" target="_blank"
                           :title="product.name" class="underline">{{ product.name }}</a>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Sold by
                        <a rel="noopener" :href="product.vendor.url"
                           target="_blank" class="hover:underline text-purple-500"
                           :title="product.vendor.name">
                            {{ product.vendor.name }}
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-3" :class="{'mb-3': product.vendor.coupons.length}">
                    <span class="text-lg font-bold">{{ price }} $</span>
                    <span v-if="!product.in_stock" class="inline-block bg-red-200 text-red-700 rounded-full text-xs px-2">Out of Stock</span>
                </div>
                <div v-show="product.vendor.coupons.length" class="space-y-1">
                    <Coupon v-for="coupon in product.vendor.coupons" :key="coupon.id" :item="coupon"></Coupon>
                </div>
            </div>
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

