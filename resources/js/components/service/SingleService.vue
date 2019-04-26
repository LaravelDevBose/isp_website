<template>
    <div class="main" role="main">
        <page-header :banner="image_path" :page_name="service.service_title"></page-header>
        <div class="container py-4">

            <div class="row">
                <div class="col">
                    <div class="blog-posts single-post">

                        <article class="post post-large blog-single-post border-0 m-0 p-0">
                            <div class="post-content ml-0">
                                <h2 class="font-weight-bold"><a href="#">{{ service.service_title}}</a></h2>

                                <p class="mb-2" >{{ service.service_heading}}</p>

                                <p class="my-3" v-html="service.service_details"></p>
                            </div>
                        </article>

                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import PageHeader from '../includes/PageHeader';
    export default {
        components:{PageHeader},
        name: "SingleService",
        data(){
            return {
                service_id:null,
                service:{},
                path:null,
                image_path:'/front/img/page-header/cover.jpg',
                page_name:'Our Services'
            }
        },
        beforeCreate(){
            this.getService(this.$route.params.serviceId);
        },
        // created(){
        //     this.getService(this.$route.params.serviceId);
        // },
        methods: {
            getService(service_id) {
                axios.get('/api/service/' + service_id)
                    .then(response => {
                        this.service = response.data
                    }).catch((error) => console.log(error));
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    // console.log(newValue.serviceId);
                    this.service_id = newValue.serviceId

                    console.log(this.service_id);
                    this.getService(this.service_id)
                },
                immediate: true,
            }
        }




    }
</script>

<style scoped>

</style>
