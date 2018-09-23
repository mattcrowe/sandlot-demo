<template>
    <section class="content-header">
        <h1><slot></slot> <slot name="subtitle"></slot></h1>
        <ol class="breadcrumb">
            <slot name="crumb1"></slot>
            <slot name="crumb2"></slot>
            <slot name="crumb3"></slot>
        </ol>
    </section>
</template>
<script>
    export default {

    }
</script>