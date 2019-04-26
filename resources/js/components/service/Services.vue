<template>
    <div class="main" role="main">
        <page-header :banner="image_path" :page_name="page_name"></page-header>
        <div class="container py-4">
            <section class="section bg-color-light border-0 m-0">
                <div class="container py">
                    <div class="row text-center text-md-left mt-4">
                        <div v-for="(service, index) in services"  :key="index" class=" col-md-4 mb-4 mb-md-0 " >
                            <div class="card animated  fadeInLeft shadow mb-1 bg-white rounded">
                            <div class="row card-body justify-content-center justify-content-md-start">
                                <div class="col-4">
                                    <img alt="" v-bind:src="service.service_logo" class="img-fluid mb-4 ">
                                </div>
                                <div class="col-lg-8">
                                    <h2 class="font-weight-bold text-5 line-height-5 mb-1" >{{ service.service_title }}</h2>
                                    <p class="mb-0" >{{ service.service_heading}}</p>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import PageHeader from '../includes/PageHeader';
    export default {
        components:{PageHeader},
        name: "Services",
        data(){
            return {
                services:{},
                image_path:'front/img/page-header/cover.jpg',
                page_name:'Our Services'
            }
        },
        created(){
            this.getServicesData();
        },
        methods:{
            getServicesData(){
                axios.get('/api/services')
                    .then(res => this.services = res.data)
                    .catch(error=>console.log(error.response.data))
            }
        }
    }
</script>

<style scoped>

</style>
