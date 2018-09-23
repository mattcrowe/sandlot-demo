<template>
    <div>
        <heading>
            Team Editor
            <small slot="subtitle">{{ team.name }}</small>
            <li slot="crumb1">
                <router-link :to="{name:'teams'}">Team Manager</router-link>
            </li>
        </heading>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form @submit.prevent="team.submit()" @keydown="team.errors.clear($event.target.name)">
                        <div class="form-group" :class="{ 'has-error': team.error('name') }">
                            <label for="name">Name *</label>
                            <input class="form-control" v-model="team.name" placeholder="name">
                            <span v-for="error in team.error('name')" class="text-danger">{{ error }}</span>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" :disabled="team.errors.any()">
                                <span v-if="team.saving"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
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
    export default {
        props: ['team'],
    }
</script>
