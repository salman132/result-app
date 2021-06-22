<template>
   <div>
       <div v-if="!showPin" class="container custom-padding">
           <div class="myForm">
               <div class="card">
                   <div class="card-header alert-dark">
                       Get your result now
                   </div>
                   <div class="card-body">
                       <form>
                           <div class="form-group">
                               <label for="exam_type">Select Level:</label>
                               <select v-model="exam_type" id="exam_type" class="form-control">
                                   <option disabled selected value="0">Select an Option</option>
                                   <option v-for="(exam,index) in examTypes" :key="index" :value="exam.id">{{ exam.title }}</option>

                               </select>
                           </div>
                           <div class="form-group">
                               <label for="registration_number">Registration Number:</label>
                               <input type="text" id="registration_number" v-model="registration_number" class="form-control" placeholder="Registration Number">
                           </div>
                           <h5 class="text-danger text-center py-4" v-if="message">{{ message }}</h5>


                           <div class="form-group text-right">

                               <input type="submit" value="Submit" class="btn btn-primary" @click.prevent="preLogin()">
                           </div>

                       </form>
                   </div>
               </div>
           </div>
       </div>
       <Pin v-else></Pin>
   </div>


</template>

<script>
import { mapActions } from 'vuex';
import Pin from "./Pin";
import auth from "../store/modules/auth";

export default {

    name: "Login",
    components:{
        Pin: Pin
    },
    data(){
        return{
            showPin:false,
            exam_type:0,
            registration_number:null,
            message: null,
            userInfo:{},
        }
    },
    created(){

        this.actionSetExamType();
        this.actionCheckAuthStatus().then(()=>{
            if(this.$store.getters.GET_AUTH_STATUS){
                //passed
                this.$router.push({name: 'Result'})
            }
        })

    },
    methods:{
        ...mapActions(['actionSetExamType','actionCheckAuthStatus']),

        checkLoginStatus(){

        },

        preLogin(){
            const url = '/api/pre-login';
            axios.post(url,{
                exam_type: this.exam_type,
                registration_number: this.registration_number,
            }).then(response =>{
                if(!response.data.status){
                    this.message = response.data.user

                }
                else {
                    this.showPin = true;
                    this.userInfo = response.data.user
                }

            }).catch(error=>{
                this.message = error.message
            })
        }
    },
    computed: {
        examTypes() {
            return this.$store.getters.GET_EXAM_TYPES;
        },

    },
}
</script>

<style scoped>
.custom-padding{
    margin-top: 35%;
}

.myForm {
    min-width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fafafa;

}
.card{
    background-color: #2c3e50 !important;
}


@media (max-width: 500px) {
    .myForm {
        min-width: 90%;
    }
}
</style>
