<template>
    <div class="small-box" :style="style">
        <div class="inner">
            <h4>
                <editable :form="form" column="title" @update="update"></editable>
            </h4>
            <p>
                <editable :form="form" column="body" @update="update"></editable>
            </p>
        </div>
        <div class="icon"></div>
        <div class="small-box-footer clearfix">
            <span v-if="form.saving" class="pull-left">
                <i class="fa fa-refresh fa-spinning"></i>
            </span>
            <span class="pull-right">
                <i class="fa fa-square-o" @click.prevent="destroy"></i>
            </span>
        </div>
    </div>
</template>

<script>
    import Form from 'js/admin/notes/form';
    import editable from 'js/admin/notes/list/editable.vue';

    export default {
        props: ['note'],
        computed: {
            style() {
                return 'background-color:#' + this.note.color;
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
            update1: _.debounce(function () {
                this.form.submit();
            }, 300),
        },
        components: {
            editable,
        }
    }
</script>
