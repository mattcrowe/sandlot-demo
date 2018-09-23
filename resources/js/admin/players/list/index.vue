<template>
    <div>
        <heading>Players Manager</heading>
        <section class="content">
            <div class="box">
                <div class="box-header"></div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <filter-search :table="table" @filter-search-update="fetch"></filter-search>
                            </div>
                            <div class="col-sm-6 text-right">
                                <router-link :to="{ name: 'players.create' }" :class="'btn btn-primary'">
                                    add player
                                </router-link>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="">
                                    <thead>
                                    <tr role="row">
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">
                                            <template v-if="table.loading">
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </template>
                                            <template v-else>
                                                ID
                                            </template>
                                        </th>
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Last Name</th>
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">First Name</th>
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Created</th>
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Updated</th>
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label=""></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <template v-for="player in table.items">
                                        <tr role="row" class="odd">
                                            <td class="">{{ player.id }}</td>
                                            <td>{{ player.last_name }}</td>
                                            <td>{{ player.first_name }}</td>
                                            <td>{{ player.created_at }}</td>
                                            <td>{{ player.updated_at }}</td>
                                            <td class="text-right">
                                                <router-link :to="{ name: 'players.edit', params: { id: player.id } }" :class="'btn btn-xs btn-default'">
                                                    edit
                                                </router-link>
                                            </td>
                                        </tr>
                                    </template>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Last Name</th>
                                        <th rowspan="1" colspan="1">First Name</th>
                                        <th rowspan="1" colspan="1">Created</th>
                                        <th rowspan="1" colspan="1">Updated</th>
                                        <th rowspan="1" colspan="1"></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <pagination :table="table"></pagination>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
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
                        //this.table.pushQueryToRouter();
                    });
            }, 300)
        }
    }
</script>
