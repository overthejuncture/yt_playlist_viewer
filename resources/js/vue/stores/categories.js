export default {
    namespaced: true,
    state() {
        return {
            items: [],
        }
    },
    mutations: {
        setAll(state, data) {
            state.items = data;
        },
    },
    actions: {
        load({ commit }) {
            axios.get('/api/youtube/categories').then(res => {
                commit('setAll', res.data);
            });
        },

    }
};
