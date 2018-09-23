<template>
    <div class="row">
        <div class="col-sm-5">
            <div role="status" aria-live="polite">
                Showing {{ table.from }} to {{ table.to }} of {{ table.total }} entries
            </div>
        </div>
        <div class="col-sm-7">
            <span class="pull-right">
                <ul class="pagination">
                    <li class="paginate_button" :class="{disabled: !isNotFirst}">
                        <a href="#" @click.prevent="paginate({page: 1})"><i class="fa fa-step-backward"></i></a>
                    </li>
                    <li class="paginate_button" :class="{disabled: !hasPrevious}">
                        <a href="#" @click.prevent="paginate({page: table.current_page - 1})"><i class="fa fa-backward"></i></a>
                    </li>
                    <template v-for="number in indexes">
                        <li class="paginate_button" :class="{ active: isActive(number) }">
                            <a href="#" @click.prevent="paginate({page: number})">{{ number }}</a>
                        </li>
                    </template>
                    <li class="paginate_button" :class="{disabled: !hasNext}">
                        <a href="#" @click.prevent="paginate({page: table.current_page + 1})"><i class="fa fa-forward"></i></a>
                    </li>
                    <li class="paginate_button" :class="{disabled: !hasLast}">
                        <a href="#" @click.prevent="paginate({page: table.last_page})"><i class="fa fa-step-forward"></i></a>
                    </li>
                </ul>
            </span>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['table'],
        computed: {
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