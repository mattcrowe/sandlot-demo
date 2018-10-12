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
        computed: {
            colors() {
                return _.get(window, 'notepad.colors', {});
            }
        },
        methods: {
            setColor(hex) {
                this.showSwatch = false;
                this.form.color = hex;
                this.form.submit();
            },
            toggle() {
                this.showSwatch = !this.showSwatch;
            },
        }
    }
</script>
