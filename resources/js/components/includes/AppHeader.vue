<template>
    <header id="header" >
        <div class="header-body border-color-primary border-top-0 box-shadow-none">
            <div class="header-container container z-index-2">
                <div class="header-row py-2">
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <ul class="header-extra-info d-flex align-items-center">
                                <li class="d-none d-sm-inline-flex">
                                    <div class="header-extra-info-text">
                                        <label>SEND US AN EMAIL</label>
                                        <strong><a >{{ contact_email }}</a></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="header-extra-info-text">
                                        <label>CALL US NOW</label>
                                        <strong><a >{{ contact_phone.no1 }}</a></strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container  bg-primary ">
                <div class="header-row container" >
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <router-link to="/">
                                    <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="/front/img/logo.jpg">
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class=" dropdown-full-color dropdown-light"><router-link to='/' class="dropdown-item dropdown-toggle" >Home</router-link></li>
                                            <li class="dropdown dropdown-full-color dropdown-light"><router-link class="dropdown-item dropdown-toggle" to="/services"> Service </router-link>
                                                <ul class="dropdown-menu" >
                                                    <li v-for="(service, index) in menu_list.services" :key="index" >
                                                        <router-link class="dropdown-item" :to="'/service/'+index"  >{{ service }}</router-link>
                                                    </li>
<!--                                                    <li v-for="(service, index) in menu_list.services" :key="index" >-->
<!--                                                        <a href="#" @click="getService(index)"  class="dropdown-item" >{{ service }}</a>-->
<!--                                                    </li>-->
                                                </ul>
                                            </li>
                                            <li class=" dropdown-full-color dropdown-light"><router-link to="/coverage" class="dropdown-item dropdown-toggle" >Coverage</router-link></li>
                                            <li class="dropdown dropdown-full-color dropdown-light"><a class="dropdown-item dropdown-toggle" href="#"> Pricing </a>
                                                <ul class="dropdown-menu">
                                                    <li><router-link class="dropdown-item" to="/home-internet">Home Internet</router-link></li>
                                                    <li><router-link class="dropdown-item" to="/corporate">Corporate</router-link></li>
                                                </ul>
                                            </li>
                                            <li class=" dropdown-full-color dropdown-light"><router-link to="/billing" class="dropdown-item dropdown-toggle" >Billing</router-link></li>
                                            <li class=" dropdown-full-color dropdown-light"><router-link to="/support" class="dropdown-item dropdown-toggle" >Support</router-link></li>
                                            <li class=" dropdown-full-color dropdown-light"><router-link to="/about-us" class="dropdown-item dropdown-toggle" >About Us</router-link></li>
                                            <li class=" dropdown-full-color dropdown-light"><router-link to="/contact-us" class="dropdown-item dropdown-toggle" >Contact Us</router-link></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
</template>

<script>
    export default {
        props:['menu_list','contact_email','contact_phone'],
        name: "AppHeader",
        data(){
            return {
                service: []

            }
        },
        methods: {
            getService(index) {

                axios.get(`/api/service/${index}`)

                    .then(res => {
                            this.service = res.data;
                        })
                    .catch(error=>console.log(error.response.data));
            }
        }
    }
</script>

<style scoped>

</style>
