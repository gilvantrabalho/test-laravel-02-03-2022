<template>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th v-for="item in header">{{ item.name}}</th>
            </tr>
        </thead>
        <tbody>
            <slot name="body"></slot>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "TableComponent.vue",
    props: ['header']
}
</script>

<style scoped>

</style>
