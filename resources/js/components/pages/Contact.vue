<template>
    <div role="main" class="main">
        <page-header :banner="image_path" :page_name="page_name"></page-header>
        <div class="container py-4">
            <div class="google-map-borders">
                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.073431874271!2d90.36405251429825!3d23.815987692185942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c128b15cc4df%3A0x37adf8155b1773d0!2sMirpur+11!5e0!3m2!1sen!2sbd!4v1554050685833!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen></iframe>
            </div>

            <div class="row py-4">
                <div class="col-lg-6">

                    <div class="overflow-hidden mb-1">
                        <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us</h2>
                    </div>
                    <div class="overflow-hidden mb-4 pb-3 ">
                        <p class="mb-0 text-info" data-appear-animation="maskUp" data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
                    </div>

                    <form class="contact-form " @submit.prevent="userMessageSubmit" data-appear-animation="fadeIn" data-appear-animation-delay="600">
                        <div v-if="success" class="contact-form-success alert alert-success mt-4" id="contactSuccess">
                            <strong>Success!</strong> {{ res_message }}.
                        </div>

                        <div v-if="error" class="contact-form-error alert alert-danger mt-4" id="contactError">
                            <strong>Error!</strong> {{ res_message }}
                            <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="required font-weight-bold text-dark">Full Name</label>
                                <input type="text" value="" v-model="name" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="required font-weight-bold text-dark">Email Address</label>
                                <input type="email" value="" v-model="email" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark">Subject</label>
                                <input type="text" value="" v-model="subject" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="required font-weight-bold text-dark">Message</label>
                                <textarea maxlength="5000" v-model="message" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div  data-appear-animation="fadeIn" data-appear-animation-delay="800">
                        <div v-if="contactUs_list" v-for="(contact, index) in contactUs_list" :key="index" >
                            <h4 class="mt-2 mb-1"><strong v-html="contact.title"></strong></h4>
                            <ul class="list list-icons list-icons-style-2 mt-2">
                                <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> <span v-html="contact.address"></span></li>
                                <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> <span v-html="contact.phone_no.no1"></span></li>
                                <li v-if="contact.phone_no.no2"><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> <span v-html="contact.phone_no.no2"></span></li>
                                <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a class="text-primary" v-html="contact.email">mail@example.com</a></li>
                            </ul>
                        </div>
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
        name: "Contact",
        data(){
            return{
                contactUs_list:{},
                image_path:'front/img/page-header/cover.jpg',
                page_name:'Our Services',
                name:'',
                email:'',
                subject:'',
                message:'',
                success:false,
                error:false,
                res_message:'',
            }
        },
        created(){
            this.getContactUsData();
        },
        methods:{
            getContactUsData(){
                axios.get('api/contact-us')
                    .then(res=> this.contactUs_list = res.data)
                    .catch(error=> console.log(error.response.data))
            },
            userMessageSubmit(){
                this.success = false;
                this.error=false;
                axios.post('api/user-message/store',{
                    name:this.name,
                    email: this.email,
                    subject: this.subject,
                    message: this.message
                })
                    .then(res=> {
                        console.log(res.data);
                        if(res.data.status == 'success'){
                            this.success = true;
                            this.res_message = res.data.message;
                        }else{
                            this.error=true;
                            this.res_message = res.data.message;
                        }
                    })
                    .catch(error=> console.log(error.response.data))
            }
        }
    }
</script>

<style scoped>

</style>
