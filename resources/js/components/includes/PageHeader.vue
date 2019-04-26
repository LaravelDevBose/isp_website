<template>
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" v-bind:style="{backgroundImage: 'url('+banner+')',}">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>{{ page_name }} <strong>Page</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">{{ page_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        props:['banner', 'page_name'],
        name: "PageHeader"
    }
</script>

<style scoped>

</style>
