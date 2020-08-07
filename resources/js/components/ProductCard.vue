<template>
    <div class="bg-gray-800 p-6 rounded flex-1 flex items-center">
        <div class="flex flex-col md:flex-row">
            <div class="flex flex-shrink-0 mb-6 md:mb-0 md:mr-6 lg:w-32 h-full">
                <div class="object-cover mx-auto w-48 md:w-24 lg:w-32 h-full">
                    <a :href="product.url" rel="noopener" target="_blank"
                       :title="product.name">
                        <img
                            class="block mx-auto h-48 md:h-24 lg:h-32 rounded" v-lazy="product.image"
                            :alt="product.name">
                    </a>
                </div>
            </div>
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <div class="text-lg font-semibold mb-1">
                        <a :href="product.url" rel="noopener" target="_blank"
                           :title="product.name" class="hover:underline">{{ product.name }}</a>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Sold by
                        <a rel="noopener" :href="product.vendor.url"
                           target="_blank" class="hover:underline text-purple-300"
                           :title="product.vendor.name">
                            {{ product.vendor.name }}
                        </a>
                    </div>
                </div>
                <div class="text-lg" :class="{'mb-2': product.vendor.coupons.length}">
                    <span>{{ price }} $</span>

                </div>
                <div v-show="product.vendor.coupons.length" class="flex flex-wrap -mx-1">
                    <div class="px-1 mb-1" v-for="coupon in product.vendor.coupons">
                        <Coupon :item="coupon"></Coupon>
                    </div>
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

