<template>
    <div>
        <i class="fas fa-palette fa-lg" @click.prevent="toggle"></i>
        <template v-if="showSwatch">
            <template v-for="color, hex in colors">
                <i v-if="hex != form.color" class="fas fa-square fa-lg" :style="'color:#' + hex" @click.prevent="setColor(hex)"></i>
            </template>
        </template>
    </div>
</template>

<script>
    export default {
        props: ['form'],
        data() {
            return {
                showSwatch: false,
            }
        },
        mounted() {
            if (!this.form.color) {
                this.form.color = this.defaultColor;
            }
        },
        computed: {
            colors() {
                return _.get(window, 'notepad.colors', {});
            },
            defaultColor() {
                return Object.keys(this.colors)[0];
            },
        },
        methods: {
            setColor(hex) {
                this.showSwatch = false;
                this.form.color = hex;
                this.$emit('update', this.note);
            },
            toggle() {
                this.showSwatch = !this.showSwatch;
            },
        }
    }
</script>
