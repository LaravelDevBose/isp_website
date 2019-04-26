<template>
    <div class="main" role="main">
        <page-header :banner="image_path" :page_name="page_name"></page-header>
        <div class="container py-4">
            <div class="pricing-table mb-4">
                <single-price v-for="(table, index) in pricingTables" :pricing="table" :key="index"></single-price>
            </div>
        </div>
    </div>
</template>

<script>
    import PageHeader from '../includes/PageHeader';
    import SinglePrice from "./SinglePrice";
    export default {
        components:{PageHeader,SinglePrice},
        name: "HomeInternet",
        data(){
            return{
                pricingTables: {},
                image_path:'front/img/page-header/cover.jpg',
                page_name:'Home-Internet Packages'
            }
        },
        created(){
            this.getPricingData();
        },
        methods:{
            getPricingData(){
                axios.get('/api/price-list/')
                    .then(res=> this.pricingTables = res.data.tables)
                    .catch(error => console.log(error.response.data));
            }
        }
    }
</script>

<style scoped>

</style>
