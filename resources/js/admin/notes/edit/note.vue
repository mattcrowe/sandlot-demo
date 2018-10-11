<template>
    <div>
        <heading>
            Note Editor
            <small slot="subtitle">{{ note.name }}</small>
            <li slot="crumb1">
                <router-link :to="{name:'notes'}">Note Manager</router-link>
            </li>
        </heading>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form @submit.prevent="note.submit()" @keydown="note.errors.clear($event.target.name)">
                        <div class="form-group" :class="{ 'has-error': note.error('name') }">
                            <label for="name">Name *</label>
                            <input class="form-control" v-model="note.name" placeholder="name">
                            <span v-for="error in note.error('name')" class="text-danger">{{ error }}</span>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" :disabled="note.errors.any()">
                                <span v-if="note.saving"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
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
        props: ['note'],
    }
</script>
