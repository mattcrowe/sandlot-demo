<template>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row notes">
                    <div class="col-lg-3 col-xs-6" v-for="note in table.items" :key="note.id">
                        <note :note="note" @destroy-note="destroyNote"></note>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Table from 'js/admin/notes/table';
    import note from 'js/admin/notes/edit.vue';

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
                this.table.destroy(note.id).then(() => this.table.index());
            },
        },
        components: {
            note,
        },
    }
</script>
