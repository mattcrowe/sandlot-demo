<template>
    <div>
        <heading>
            Player Creator
            <li slot="crumb1"><router-link :to="{name:'players'}">Player Manager</router-link></li>
        </heading>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form @submit.prevent="submit()" @keydown="form.errors.clear($event.target.name)">
                        <div class="form-group" :class="{ 'has-error': form.error('first_name') }">
                            <label for="first_name">First Name *</label>
                            <input class="form-control" v-model="form.first_name" placeholder="first name">
                            <span v-for="error in form.error('first_name')" class="text-danger">{{ error }}</span>
                        </div>
                        <div class="form-group" :class="{ 'has-error': form.error('last_name') }">
                            <label for="last_name">Last Name *</label>
                            <input class="form-control" v-model="form.last_name" placeholder="last name">
                            <span v-for="error in form.error('last_name')" class="text-danger">{{ error }}</span>
                        </div>
                        <div cl
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

    import Form from 'js/admin/players/form';

    export default {
        data() {
            return {
                form: new Form(),
            }
        },
        methods: {
            submit() {
                this.form.submit()
                    .then((player) => {
                        this.$router.push({name: 'players.edit', params: {id: player.id}})
                    });
            }
        }
    }
</script>
