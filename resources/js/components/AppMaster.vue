<template>
    <div class="body">
        <app-header :menu_list="menuList" :contact_email="contactUs.email" :contact_phone="contactUs.phone_no"></app-header>

        <router-view></router-view>
        <app-footer :contact_info="contactUs" :services="menuList"></app-footer>
    </div>
</template>

<script>
    import AppHeader from './includes/AppHeader';

    import AppFooter from './includes/AppFooter';

    export default {
        components:{AppHeader, AppFooter},
        name: "AppMaster",
        data(){
            return {
                menuList:{},
                contactUs:{},
            }
        },
        created() {
            this.getMenuData();
            this.getFooterData();
        },
        methods:{

            getMenuData(){
                axios.get('/api/menu-list')
                    .then(res => this.menuList = res.data)
                    .catch(error => console.log(error.response.data))
            },
            getFooterData(){
                axios.get('/api/footer-info')
                    .then(res => this.contactUs = res.data.contactUs)
                    .catch(error => console.log(error.response.data))
            },

        }
    }

</script>

<style scoped>

</style>
