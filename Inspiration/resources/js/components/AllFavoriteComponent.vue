<template>

</template>

<script>
    export default {
        name: "AllFavoriteComponent",

        beforeUpdate() {
            this.$emit('close-loading');
        },
    }

</script>

<style scoped>

</style>
