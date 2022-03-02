<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <slot name="body"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContainerBodyComponent.vue"
}
</script>

<style scoped>

</style>
