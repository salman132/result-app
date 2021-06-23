
export default {
    state: {
        auth:true,


    },
    getters: {
        GET_AUTH_STATUS(state) {
            return state.auth;
        }

    },
    mutations: {
        SET_AUTH_STATUS(state,payload){

            return state.auth = payload;
        }

    },
    actions: {
        async actionCheckAuthStatus({commit}) {

            const url = '/api/init';
            const token = localStorage.getItem('token');
            if(typeof token == 'undefined' || token ==null){
                commit('SET_AUTH_STATUS',false)
            }
            let config = {
                headers: {
                    'Authorization': token
                }
            }
            commit('SET_AUTH_STATUS', await axios.get(url,config)
                .then(response => {
                    if(response.data.status){
                        return true;
                    }
                    else{
                        return false;
                    }
                }).catch(error =>{
                    return false;
                })
            )
        },

    }
}
