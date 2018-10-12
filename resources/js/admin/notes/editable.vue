<template>
    <div contenteditable="true" @blur="update" v-model="form[column]">{{ form[column] }}</div>
</template>

<script>
    export default {
        props: ['form', 'column'],
        methods: {
            update(event) {
                this.form[this.column] = event.target.innerText;
                this.$emit('update');
            },
        }
    }
</script>
