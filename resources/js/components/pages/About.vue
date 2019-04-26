<template>
    <div role="main" class="main">
        <page-header :banner="page_data.image_path" :page_name="page_name"></page-header>
        <div class="container py-4">
            <div class="row">
                <div class="col">
                    <div v-if="page_data" class="blog-posts single-post">
                        <article class="post post-large blog-single-post border-0 m-0 p-0">
                            <div class="post-content ml-0">
                                <p style="margin-bottom: 0;" v-html="page_data.details"></p>
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
        name: "About",
        data(){
            return{
                page_data:{},
                page_name:'About Us',

            }
        },
        created(){
            this.getGeneralPageData();
        },
        methods:{
            getGeneralPageData(){
                axios.post('api/general-page', {
                    page_name: 'aboutUs',
                })
                    .then(res => this.page_data = res.data.page_data)
                    .catch(error => console.log(error.response.data))
            }
        }
    }
</script>

<style scoped>

</style>
