<template>
    <div >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="index" v-for="(slider,index) in sliders" :class="{active:!slider.index == index}"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item" :class="{active:!slider.index == index}" v-for="(slider,index) in sliders" :key="index" >

                    <img class="bd-placeholder-img " style="margin-top:-1rem" width="100%" height="100%" :src="slider.image_path" alt="">
                    <div class="container">
                        <div class="carousel-caption text-center">
                            <h1 class="text-primary"  style="font-weight: bold; margin-top:-10rem;">{{slider.headings.h1}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Slider",
        data(){
            return{
                sliders:{}
            }
        },
        created() {

            axios.get('/api/slider-info/')
                .then(res=> this.sliders = res.data)
                .catch(error=> console.log(error.response.data))
        }
    }
</script>

<style scoped>

</style>
