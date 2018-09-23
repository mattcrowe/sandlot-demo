<template>
    <div class="row">
        <div class="col-sm-5">
            <p><div class="dataTables_info" role="status" aria-live="polite">Showing {{ table.from }} to {{ table.to }} of {{ table.total }} entries</div></p>
        </div>
        <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    <li class="paginate_button" :class="{previous: hasPrevious}">
                        <a href="#" aria-controls="" data-dt-idx="0" tabindex="0"><i class="fa fa-backward"></i></a>
                    </li>
                    <template v-for="number in indexes">
                        <li class="paginate_button" :class="{ active: isActive(number) }">
                            <a href="#" @click.prevent="paginate({page: number})">{{ number }}</a>
                        </li>
                    </template>
                    <li class="paginate_button" :class="{next: hasNext}">
                        <a href="#" aria-controls="" data-dt-idx="7" tabindex="0"><i class="fa fa-forward"></i></a>
                    </li>
                    <li class="paginate_button">
                        <a href="#" aria-controls="" data-dt-idx="7" tabindex="0" :disabled="hasLast"><i class="fa fa-step-forward"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['table'],
        computed: {
            showAll() {
                if (this.table == undefined || this.table.length == 0) {
                    return false;
                }

                if (this.table.per_page <= 20 && this.table.total <= this.table.per_page) {
                    return false;
                }

                return this.table.total > 0 || this.table.total > this.table.per_page;
            },
            showPageLinks() {
                if (this.table.total <= this.table.per_page) {
                    return false;
                }

                return true;
            },
            perPage() {
                return this.table.per_page ? this.table.per_page : 15;
            },
            isNotFirst() {
                return this.table.current_page != 1
            },
            hasLast() {
                return this.table.current_page != this.table.last_page;
            },
            hasNext() {
                return this.table.last_page - this.table.current_page > 0;
            },
            hasPrevious() {
                return this.table.current_page - 1 > 0;
            },
            indexes() {

                let max = 5;
                let first = this.table.current_page;

                let values = [];

                let midpoint = Math.ceil(max / 2);

                if (this.table.last_page - max > 0) {

                    if (this.table.current_page >= midpoint) {
                        first = this.table.current_page - (max % midpoint);
                    }

                    if (this.table.last_page - this.table.current_page < midpoint) {
                        first = this.table.last_page - (max - 1)
                    }
                }

                if (this.table.last_page - max <= 0) {
                    first = 1;
                    max = this.table.last_page;
                }

                let i = first;
                while (i < first + max) {
                    values.push(i);
                    i++;
                }

                return values;
            },

        },
        methods: {
            paginate(query) {
                this.table.updateQuery(query);
                this.table.index();
                if (this.table.router) {
                    this.table.router.push({query: this.table.getQuery()});
                }
            },
            isActive(id) {
                return id == this.table.current_page;
            }
        },
    }
</script>