<template>
    <div class="main" role="main">

        <slider></slider>
        <section class="section bg-color-light border-0 mt-10" id="practice-areas">
            <div class="container">
                <div class="row text-center text-md-left mt-4">
                    <div v-for="service in services"  class="col-md-4 mb-4 mb-md-0  c-service" >
                        <div class="card shadow mb-1 bg-white rounded animated  bounceInRight ">
                            <div class="row card-body justify-content-center justify-content-md-start">
                                <div class="col-4">
                                    <img alt="" v-bind:src="service.service_logo" class="img-fluid mb-4" >
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
        <!--general-->

        <section class="parallax section section-text-light section-parallax mt-0 mb-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="front/img/parallax/parallax-2.jpg">
            <div class="container">
                <div class="pricing-table">
                    <single-price v-for="(table, index) in pricingTables" :pricing="table" :key="index"></single-price>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import slider from './Slider'
    import SinglePrice from "../pricing/SinglePrice";
    export default {
        components:{SinglePrice, slider},
        name: "Home",
        data(){
            return{

                services:{},
                pricingTables: {},
            }
        },
        created() {
            this.getServiceData();
            this.getPricingData();
        },
        methods:{
            getServiceData(){
                axios.get('/api/services/')
                .then(res=> this.services = res.data)
                .catch(error => console.log(error.response.data));
            },
            getPricingData(){
                axios.get('/api/price-table/')
                    .then(res=> this.pricingTables = res.data.tables)
                    .catch(error => console.log(error.response.data));
            }

        }
    }
</script>

<style scoped>
.c-service .col-4{
padding: 10px;
}
</style>
