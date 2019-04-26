<template>
    <div id="genera">
        <section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 pb-sm-4 pb-lg-0 pr-lg-5 mb-sm-5 mb-lg-0">
                        <h2 class="text-color-dark font-weight-normal text-6 mb-2">About <strong
                            class="font-weight-extra-bold">Our Company</strong></h2>

                        <p class="pr-5 mr-5" v-html=""></p>
                        <a class="btn btn-dark font-weight-semibold btn-px-4 btn-py-2 text-2" href="#">LEARN MORE</a>
                    </div>
                    <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 mt-sm-5"
                         style="top: 1.7rem;">
                        <img alt=""
                             class="img-fluid position-absolute d-none d-sm-block appear-animation"
                             data-appear-animation="expandIn" data-appear-animation-delay="300"
                              :src="aboutUs.image_path" style="top: 10%; left: -50%;"/>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "GeneralContent",
        data(){
            return{
                aboutUs:{},

            }
        },
        created() {
            this.get_content_data();
        },
        methods:{
            get_content_data(){
                axios.get('/api/general-content')
                .then(res=>{
                       this.aboutUs = res.data.aboutUs;
                })
            }
        }
    }
</script>

<style scoped>

</style>
