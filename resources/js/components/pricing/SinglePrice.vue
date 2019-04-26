<template>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 animated  bounceInDown">
            <div class="plan ">
                <div class="plan-header bg-primary">
                    <h3>{{ pricing.package_name }}</h3>
                </div>
                <div class="plan-price">
                    <span class="price"><span class="price-unit">$</span>{{ pricing.package_price }}</span>
                    <label class="price-label">PER {{ pricing.package_time }}</label>
                </div>
                <div class="plan-features">
                    <p v-html="pricing.package_details " style="margin-bottom: 0px"></p>
                </div>
                <div class="plan-footer">
                    <router-link to="/contact-us" class="btn btn-primary btn-modern btn-outline">contact Us</router-link>
                </div>
            </div>
        </div>

</template>

<script>
    export default {
        props:['pricing'],
        name: "SinglePrice"
    }
</script>

<style scoped>

</style>
