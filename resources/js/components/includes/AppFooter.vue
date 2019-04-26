<template>
    <footer id="footer" class="mt-0">
        <div class="container my-4">
            <div class="row py-5">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Company Profile</h5>
                    <p class="text-4 mb-0">
                        <router-link to="/about-us">
                            <span class="text-color-light">About Company</span>
                        </router-link>
                    </p>
                    <p class="text-4 mb-0">
                        <router-link to="/billing">
                            <span class="text-color-light">Our Billing</span>
                        </router-link>
                    </p>
                    <p class="text-4 mb-0">
                        <router-link to="/support">
                            <span class="text-color-light">Support Center</span>
                        </router-link>
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Our Services</h5>
                    <p class="text-4 mb-0" v-if="services" v-for="(service,index) in services.services" :key="index">
                        <router-link to="/service"><span class="text-color-light">{{ service}}</span></router-link>
                    </p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Social Media</h5>
                    <p class="text-4 mb-0"><span class="text-color-light">{{ contact_info.title}}</span></p>
                    <p class="text-4 mb-0">Email: <span class="text-color-light">{{ contact_info.email}}</span></p>
                    <p class="text-4 mb-0">Phone: <span class="text-color-light" >{{ contact_info.phone_no.no1 }}</span></p>
                    <p class="text-4 mb-0">Phone: <span class="text-color-light" >{{ contact_info.phone_no.no2 }}</span></p>
                    <ul class="footer-social-icons social-icons m-0">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-copyright footer-copyright-style-2 pb-0">
                <div class="row py-4">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>© Copyright 2019. All Rights Reserved. <span class="text-color-light text-right">Powered By: <a
                            href="www.brainchildsoft.com">BrainChild Software</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        props:['contact_info','services'],
        name: "AppFooter"
    }
</script>

<style scoped>

</style>
