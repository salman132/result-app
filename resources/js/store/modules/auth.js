
export default {
    state: {
        auth:false,


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
                return false;
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
                })
            )
        },

    }
}
