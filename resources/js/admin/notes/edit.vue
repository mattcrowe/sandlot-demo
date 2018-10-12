<template>
    <div class="small-box" :style="style">
        <div class="small-box-footer clearfix">
            <span class="pull-left">
                <colors :form="form"></colors>
            </span>
            <span class="pull-right">
                <i class="fas fa-times fa-lg" @click.prevent="destroy"></i>
            </span>
        </div>
        <div class="inner">
            <editable :form="form" column="body" @update="update"></editable>
        </div>
    </div>
</template>

<script>
    import Form from 'js/admin/notes/form';
    import colors from 'js/admin/notes/colors.vue';
    import editable from 'js/admin/notes/editable.vue';

    export default {
        props: ['note'],
        computed: {
            style() {
                return 'background-color:#' + this.form.color;
            },
        },
        data() {
            return {
                form: new Form(),
            }
        },
        mounted() {
            this.form.setData(this.note);
        },
        methods: {
            destroy() {
                this.$emit('destroy-note', this.note);
            },
            update() {
                this.form.submit();
            },
        },
        components: {
            colors,
            editable,
        }
    }
</script>
