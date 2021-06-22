<template>
    <div class="pin">
        <form>
            <div class="text-info" v-if="phone">
                A code was sent to your this <span class="text-success">{{ phone }}</span> number
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="PIN Number" :value="pin">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary" @click.prevent="login()">
            </div>
            <div class="text-danger" v-if="wait">
                <a href="#" class="text-danger" @click.prevent="codeRetry()">Send code again</a>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Pin.vue",
    data(){
        return{
            wait:false,
            pin:null,
            phone:null,
        }
    },
    created() {
        this.setCodeAgain()
        this.getPinNumber();
        this.getPhoneNumber();
    },
    methods:{
        setCodeAgain(){
            setTimeout(()=>{
                this.wait = true;
            },5000)
        },
        getPinNumber(){
          setTimeout(()=>{
              this.pin = this.$parent.userInfo.pin_number
          },1500)
        },
        getPhoneNumber(){
            this.phone = this.$parent.userInfo.encrypted_phone_number;
        },
        login(){
            const url = '/api/login'
            axios.post(url,{
                exam_type: this.$parent.userInfo.exam_type,
                registration_number: this.$parent.userInfo.registration_number,
                pin_number: this.pin,
            }).then(response =>{
                console.log(response)
                if(!response.data.status){
                    this.message = response.data.token

                }
                else {
                    console.log(response.data.token)
                    localStorage.setItem('token',response.data.token)

                }

            }).catch(error=>{
                this.message = error.message
            })
        },
        codeRetry(){
            const url = '/api/send_sms';
            axios.post(url,{
                id: this.$parent.userInfo.id,

            }).then(response =>{
                if(response.data.status){
                    this.pin = response.data.user.pin_number

                }


            }).catch(error=>{
                this.message = error.message
            })
        }
    }
}
</script>

<style scoped>
.pin {
    width: 350px;
    margin: auto;
    margin-top: 22%;
    text-align: center;
}

</style>
