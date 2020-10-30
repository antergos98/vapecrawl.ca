<template>
    <div v-if="open"
         class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg w-3/4 sm:max-w-xl z-50">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full mb-6">
                    <div class="text-gray-900 font-medium text-xl">Age Validation</div>
                    <svg @click="close" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </div>
                <hr>
                <div class="text-gray-900 mb-3">
                    The products on this website are intended for adults only. By selecting YES, you certify that you
                    are of legal smoking age in the province/state in which you reside.
                    <br><br>
                    <strong>
                        WARNING: This Product Contains Nicotine. Nicotine is an addictive chemical.
                    </strong>
                </div>
                <div class="ml-auto">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" @click="validate">
                        Yes
                    </button>
                    <button class="bg-transparent text-black font-semibold py-2 px-4 focus:outline-none" @click="close">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'age-validation-modal',
        data() {
            return {
                open: true
            }
        },
        mounted() {
            this.open = !document.cookie.includes('agevalidation')
        },
        methods: {
            validate() {
                document.cookie = "agevalidation=true"
                this.open = false
            },
            close() {
                location.href = "https://google.ca"
            }
        }
    }
</script>
