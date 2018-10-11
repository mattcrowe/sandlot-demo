<template>
    <div>
        <heading>Notes Manager</heading>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6 text-right">
                                <router-link :to="{ name: 'notes.create' }" :class="'btn btn-primary'">
                                    add note
                                </router-link>
                            </div>
                        </div>
                        <br/>


                        <div class="row notes">
                            <template v-for="note in table.items">
                                <div class="col-lg-3 col-xs-6">
                                    <note :note="note" @destroy-note="destroyNote"></note>
                                </div>
                            </template>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
    </div>
</template>

<script>
    import Table from 'js/admin/notes/table';
    import note from 'js/admin/notes/list/note.vue';

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
            destroyNote(note) {
                this.table.destroy(note.id).then(() => table.index());
            },
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
        },
        components: {
            note,
        },
    }
</script>
