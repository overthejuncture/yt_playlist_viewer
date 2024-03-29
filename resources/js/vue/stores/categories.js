export default {
    namespaced: true,
    state() {
        return {
            items: [],
        }
    },
    mutations: {
        setAll(state, data) {
            state.items = data
            // data.forEach((value) => {
            //     state.items[value.id] = value;
            // })
        },
    },
    actions: {
        load({commit}) {
            axios.get('/api/categories').then(res => {
                commit('setAll', res.data);
            });
        },
        // TODO this shouldn't be there
        addToVideo({commit}, data) {
            axios.post(`/api/videos/${data.videoId}/categories`, {
                categories: data.categories
            });
        },
        delete({dispatch}, data) {
            axios.delete('/api/categories/' + data)
                .then(() => {
                    dispatch('load');
                })
        }
    }
};
