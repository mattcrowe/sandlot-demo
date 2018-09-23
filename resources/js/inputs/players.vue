<template>
    <div class="box">
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <filter-search :table="table" @filter-search-update="fetch"></filter-search>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped table-condensed table-hover dataTable" role="grid" aria-describedby="">
                            <tbody>
                            <template v-for="player in table.items">
                                <tr role="row" class="odd">
                                    <td class="">{{ player.id }}</td>
                                    <td>{{ player.last_name }}</td>
                                    <td>{{ player.first_name }}</td>
                                    <td class="text-right">
                                        <button @click.prevent="attach(player)" class="btn btn-default"><i class="fa fa-link"></i></button>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <pagination :table="table"></pagination>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>
    import Table from 'js/admin/players/table';

    export default {
        data() {
            return {
                table: new Table(),
            }
        },
        mounted() {
            this.table.updateQuery({perPage: 5});
            this.table.index();
        },
        methods: {
            fetch: _.debounce(function (query) {
                if (query) {
                    query.page = 1;
                    this.table.updateQuery(query);
                }
                this.table.index()
                    .then(() => {

                    });
            }, 300),
            attach(player) {
                this.$emit('attach-player', player);
            }
        }
    }
</script>