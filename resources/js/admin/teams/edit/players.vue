<template>
    <div>
        <div v-if="addPlayer">
            <heading>Add Team Players</heading>
            <section class="content">
                <player-input @attach-player="attach"></player-input>
            </section>
        </div>
        <section class="content-header">
            <h1>Team Players
                <span class="pull-right">
                    <button class="btn btn-default" @click.prevent="addPlayer = !addPlayer"><i class="fa fa-plus"></i></button>
                </span>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">

                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <filter-search :table="table" @filter-search-update="fetch"></filter-search>
                            </div>
                            <div class="col-sm-6 text-right">

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
                                        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-sort="" aria-label=""></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <template v-for="player in table.items">
                                        <tr role="row" class="odd">
                                            <td class="">{{ player.id }}</td>
                                            <td>{{ player.last_name }}</td>
                                            <td>{{ player.first_name }}</td>
                                            <td class="text-right">
                                                <button @click.prevent="detach(player)" class="btn btn-default"><i class="fa fa-unlink"></i></button>
                                            </td>
                                        </tr>
                                    </template>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Last Name</th>
                                        <th rowspan="1" colspan="1">First Name</th>
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
    import Form from 'js/admin/players/form';
    import Table from 'js/admin/players/table';
    import playerInput from 'js/inputs/players.vue';

    export default {
        props: ['team'],
        data() {
            return {
                form: new Form(),
                table: new Table(),
                addPlayer: false,
            }
        },
        watch: {
            'team.id': function (team_id) {
                if (team_id) {
                    this.table.query.team_id = team_id;
                    this.table.index();
                }
            }
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
            }, 300),
            attach(player) {
                this.form.setData(player);
                this.form.team_id = this.team.id;
                this.form.submit()
                    .then(() => {
                        this.fetch();
                    });
            },
            detach(player) {
                this.form.setData(player);
                this.form.team_id = null;
                this.form.submit()
                    .then(() => {
                        this.fetch();
                    });
            }
        },
        components: {
            playerInput
        }
    }
</script>
