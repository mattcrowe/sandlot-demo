<template>
    <div>
        <heading>
            Note Creator
            <li slot="crumb1"><router-link :to="{name:'notes'}">Note Manager</router-link></li>
        </heading>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form @submit.prevent="submit()" @keydown="form.errors.clear($event.target.name)">
                        <div class="form-group" :class="{ 'has-error': form.error('name') }">
                            <label for="name">Name *</label>
                            <input class="form-control" v-model="form.name" placeholder="name">
                            <span v-for="error in form.error('name')" class="text-danger">{{ error }}</span>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" :disabled="form.errors.any()">
                                <span v-if="form.saving"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
                                <span v-else>save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

    import Form from 'js/admin/notes/form';

    export default {
        data() {
            return {
                form: new Form(),
            }
        },
        methods: {
            submit() {
                this.form.submit()
                    .then((note) => {
                        this.$router.push({name: 'notes.edit', params: {id: note.id}})
                    });
            }
        }
    }
</script>
