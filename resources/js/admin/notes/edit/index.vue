<template>
    <div>
        <note :note="note"></note>
    </div>
</template>

<script>

    import Form from 'js/admin/notes/form';
    import note from 'js/admin/notes/edit/note';

    export default {
        data() {
            return {
                note: new Form(),
            }
        },
        mounted() {
            this.note.show(this.$route.params.id);
        },
        components: {
            note,
        },
    }
</script>
