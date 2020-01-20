<template>

</template>

<script>
    export default {
        name: "AllReviewComponent",

        beforeUpdate() {
            this.$emit('close-loading');
        },
    }
</script>

<style scoped>

</style>
