<template>
    <div class="bg-gray-800 rounded p-4 flex flex-col w-full">
        <div>
            <div class="mb-4">
                <a :href="`/products/${product.id}`" @click="handleProductClick" :title="productName" target="_blank">
                    <img v-lazy="product.image" class="object-scale-down h-56 w-full max-w-none rounded bg-white" :alt="productName">
                </a>
            </div>
            <div class="lg:flex lg:flex-col lg:justify-between">
                <div class="mb-4 lg:mb-0">
                    <a v-html="formattedName" :href="`/products/${product.id}`" :title="productName" @click="handleProductClick" target="_blank" class="text-md uppercase hover:underline font-semibold"></a>
                    <div class="text-sm hidden lg:block">
                        Sold by
                        <a :href="`/vendors/${product.vendor.slug}`" @click="handleVendorClick" target="_blank" :title="product.vendor.name" class="hover:underline font-semibold text-indigo-500">
                            {{ product.vendor.name }}
                        </a>
                    </div>
                </div>
                <div class="lg:mt-4">
                    <div class="flex items-center justify-between lg:justify-start">
                        <div class="lg:mr-4">
                            <span class="font-bold text-2xl">{{(product.price / 100).toFixed(2) }}&nbsp;$</span>
                        </div>
                        <div v-if="product.in_stock">
                            <span class="inline-block mr-auto bg-green-200 text-green-700 rounded-full text-sm px-2">In Stock</span>
                        </div>
                        <div v-else>
                            <span class="inline-block mr-auto bg-red-200 text-red-700 rounded-full text-sm px-2">Out of Stock</span>
                        </div>
                    </div>
                    <div class="text-sm lg:hidden">
                        Sold by
                        <a :href="`/vendors/${product.vendor.slug}`" @click="handleVendorClick" :title="product.vendor.name" class="hover:underline text-indigo-500">
                            {{ product.vendor.name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="product.vendor.shipping_info || product.vendor.coupons.length" class="mt-4 space-y-2">
            <div class="flex">
                <ShippingInfo v-show="product.vendor.shipping_info">
                    {{ product.vendor.shipping_info }}
                </ShippingInfo>
            </div>
            <div v-show="product.vendor.coupons.length" class="flex flex-col space-y-2">
                <Coupon v-for="coupon in product.vendor.coupons" :key="coupon.id" :item="coupon"/>
            </div>
        </div>
    </div>
</template>

<script>
    import Coupon from "./Coupon";
    import ShippingInfo from "./ShippingInfo";

    export default {
        props: ['product'],
        name: "ProductCard",
        components: {Coupon, ShippingInfo},
        computed: {
            price() {
                return (this.product.price / 100).toFixed(2)
            },
            productName() {
                const textarea = document.createElement("textarea")
                textarea.innerHTML = this.product.name
                return textarea.value
            },

            formattedName() {
                return this.product.formattedName || this.product.name;
            }
        },
        methods: {
            handleProductClick () {
                if ('_paq' in window) {
                    window._paq.push(['trackEvent', 'Product click', `${this.product.name} (${this.product.unique_id})`]);
                }
                console.log('clicked');
            },

            handleVendorClick () {
                if ('_paq' in window) {
                    window._paq.push(['trackEvent', 'Vendor click', this.product.vendor.name]);
                }
                console.log('clicked');
            }
        }
    }
</script>
