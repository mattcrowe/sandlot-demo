<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Teams</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <filter-search :table="table" @filter-search-update="fetch"></filter-search>
                    </div>
                    <div class="col-sm-6 text-right">
                        <router-link :to="{ name: 'teams.create' }" :class="'btn btn-xs btn-primary'">
                            add team
                        </router-link>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="">
                            <thead>
                            <tr role="row">
                                <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">ID</th>
                                <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Name</th>
                                <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Created</th>
                                <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label="">Updated</th>
                                <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label=""></th>
                            </tr>
                            </thead>
                            <tbody>

                            <template v-for="team in table.items">
                                <tr role="row" class="odd">
                                    <td class="">{{ team.id }}</td>
                                    <td>{{ team.name }}</td>
                                    <td>{{ team.created_at }}</td>
                                    <td>{{ team.updated_at }}</td>
                                    <td>
                                        <router-link :to="{ name: 'teams.edit', params: { id: team.id } }" :class="'btn btn-xs btn-default'">
                                            edit
                                        </router-link>
                                    </td>
                                </tr>
                            </template>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Name</th>
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
</template>

<script>

    import Table from 'js/admin/teams/table';

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
