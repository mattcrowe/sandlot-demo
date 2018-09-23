<template>
    <div class="form-group filter pull-left">
        <label>
            <slot>Filter <i v-if="table.loading" class="fa fa-spinner fa-spin"></i></slot>
        </label>
        <div class="form-group">
            <div class="input-group">
                <input
                        class="form-control"
                        v-model="needle"
                        placeholder="filter"
                        @keydown="filter()"
                >
                <div v-if="needle" class="input-group-addon" @click.prevent="clear">
                    <i class="fa fa-times-circle"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['table'],
        data() {
            return {
                needle: '',
            };
        },
        watch: {
            'table.query.q': function (new_needle) {
                if (new_needle) {
                    this.needle = new_needle;
                }
            }
        },
        methods: {
            filter: _.debounce(function (query) {
                this.$emit('filter-search-update', {page: 1, q: this.needle});
            }, 750),
            clear() {
                this.needle = '';
                this.$emit('filter-search-update', {q: ''});
            },
        },
    }
</script>