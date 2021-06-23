<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="text-success" v-if="user_data.name">
                    Name: {{ user_data.name }}
                </div>
                <div class="text-right">
                    <a class="text-danger" @click.prevent="logout">
                        Logout
                    </a>
                </div>
            </div>
            <h5 v-if="user_data.registration_number">Registration Number: {{ user_data.registration_number }}</h5>
            <h5 v-if="user_data.exam_type">Exam Type: {{ user_data.exam_type.title }}</h5>
            <h6 v-if=" user_data.user_profile">Gender: {{ user_data.user_profile.gender }} </h6>
            <h6 v-if=" user_data.user_profile">Email: {{ user_data.user_profile.email }} </h6>
        </div>
        <div class="card-body">
            <table class="table table-success">
                <tbody>
                <tr>
                    <th>Subject</th>
                    <th>Score</th>
                    <th>Grade</th>
                </tr>

                <tr v-for="(result,index) in user_data.results" :key="index">


                    <th v-if="result.exam.courses">{{ result.exam.courses.title }}</th>
                    <td v-if="result.score">{{ result.score }}</td>
                    <td v-if="result.grade" :class="result.grade == 'F' ? 'text-danger' : ''">{{ result.grade }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Results",
    data() {
        return {
            user_data: [],
        }
    },

    created() {
        this.getResult()
    },

    methods: {
        async getResult() {
            const url = '/api/result_data';
            const token = localStorage.getItem('token');
            if (typeof token == 'undefined' || token == null) {
                return false;
            }
            let config = {
                headers: {
                    'Authorization': token
                }
            }
            await axios.get(url, config).then(response => {
                this.user_data = response.data
            }).catch(error => {
                console.log(error)
            })
        },

        logout() {
            const url = '/api/logout';
            const token = localStorage.getItem('token');
            if (typeof token == 'undefined' || token == null) {
                return false;
            }
            let config = {
                headers: {
                    'Authorization': token
                }
            }
            axios.get(url, config).then(response => {

                this.$store.state.user.auth = false;
                localStorage.removeItem('token')
                this.$router.push({name: 'Login'})
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
