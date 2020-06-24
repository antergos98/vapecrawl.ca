<template>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/3 lg:w-1/4 mb-3 lg:mb-0">
            <div class="px-3">
                <multiselect placeholder="Sort by..." :show-labels="false" :show-pointer="false" label="label"
                             :options="sortOptions"
                             track-by="label"
                             v-model="sort"
                             @input="onSortChange"></multiselect>
            </div>
        </div>

        <div class="w-full md:w-1/3 lg:w-1/4 mb-3 lg:mb-0">
            <div class="px-3">
                <multiselect placeholder="Filter by availability ..." :options="filterByAvailabilityOptions" :show-labels="false" :show-pointer="false"
                             label="label"
                             track-by="label"
                             v-model="availability" @input="onFilterChange"></multiselect>
            </div>
        </div>

        <div class="w-full md:w-1/3 lg:w-1/2 mb-3 lg:mb-0">
            <div class="px-3">
                <multiselect placeholder="Filter by vendors..." multiple :options="filterByVendorsOptions" :show-labels="false" :show-pointer="false"
                             label="label"
                             track-by="value"
                             v-model="vendors" @input="onFilterChange"></multiselect>
            </div>
        </div>
    </div>
</template>

<script>
    import _uniqBy from 'lodash/uniqBy';
    import _map from 'lodash/map';
    import _isEmpty from 'lodash/isEmpty';
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'filters',
        components: {Multiselect},
        data: () => ({
            availability: null,
            sort: null,
            vendors: [],
            sortOptions: [
                {label: 'Price (low to high)', key: 'price', direction: 'asc'},
                {label: 'Price (high to low)', key: 'price', direction: 'desc'}
            ],
            filterByAvailabilityOptions: [
                {label: 'In Stock', key: 'in_stock', value: true},
                {label: 'Out of Stock', key: 'in_stock', value: false}
            ]
        }),
        methods: {
            onSortChange(value) {
                this.$store.commit('set_sort', value ? {key: value.key, direction: value.direction} : null);
            },

            onFilterChange() {
                let filters = {}

                if (this.availability) {
                    filters['in_stock'] = this.availability.value;
                }

                if (this.vendors.length) {
                    filters['vendor.id'] = _map(this.vendors, 'value');
                }

                this.$store.commit('set_filters', _isEmpty(filters) ? null : filters);
            }
        },
        computed: {
            filterByVendorsOptions() {
                return _uniqBy(this.$store.state.results, 'vendor.id')
                    .map(result => ({label: result.vendor.name, key: 'vendor.id', value: result.vendor.id}));
            }
        }
    }
</script>

<style lang="scss">
    /* purgecss start ignore */
    $text: #1a202c;
    $main: #303030;

    .multiselect {
        color: $text;
    }

    .multiselect__tags {
        border: 1px solid #e2e8f0;
    }

    .multiselect__placeholder {
        color: lighten($text, 15);
    }

    .multiselect__tag {
        background: $main;
    }

    .multiselect__option--group {
        background: $main;
        color: #FfF;
    }

    .multiselect__option--selected {
        background: lighten($main, 70);
        font-weight: normal;

        &:after {
            content: '✓';
            color: $main;
            font-size: 20px;
        }

        color: #222;
    }

    .multiselect__tag-icon {

        &:after {
            color: white;
        }

        &:hover {
            background: lighten($main, 5);
        }
    }

    @import '~vue-multiselect/dist/vue-multiselect.min.css';
    /* purgecss end ignore */
</style>
