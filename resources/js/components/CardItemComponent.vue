<template>
    <div>
        <div class="shadow-sm p-3 mb-3 card-item d-block">
            <p class="title-card-item">{{title}}</p>
            <div class="footer">
                <slot name="mostrar_mais"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardItemComponent",
    props: ['title']
}
</script>

<style>
    .card-item
    {
        transition: 0.5s;
        height: 120px;
    }

    .card-item:hover
    {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }

    .title-card-item
    {
        height: 70px;
        padding: 0px !important;
        margin: 0px !important;
        word-wrap: break-word;
        /*text-overflow: ellipsis;*/
        /*white-space: nowrap;*/
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
