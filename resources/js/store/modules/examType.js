export default {
    state: {
        examTypes:[],


    },
    getters: {
        GET_EXAM_TYPES(state) {
            return state.examTypes;
        }

    },
    mutations: {
        SET_EXAM_TYPES(state,payload){

            return state.examTypes = payload;
        }

    },
    actions: {
        async actionSetExamType({commit}) {

            const url = '/api/exam_type';
            let user = localStorage.getItem('token');
            commit('SET_EXAM_TYPES', await axios.get(url)
                .then(response => {
                    return response.data;
                })
            )
        },

    }
}
