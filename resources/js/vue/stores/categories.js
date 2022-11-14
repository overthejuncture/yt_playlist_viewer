export default {
    namespaced: true,
    state() {
        return {
            items: {},
        }
    },
    mutations: {
        setAll(state, data) {
            data.forEach((value) => {
                state.items[value.id] = value;
            })
        },
    },
    actions: {
        load({commit}) {
            axios.get('/api/youtube/categories').then(res => {
                commit('setAll', res.data);
            });
        },
        addToVideo({commit}, data) {
            axios.post('/api/youtube/categories/set', {
                videoId: data.videoId,
                categoryId: data.categoryId
            }).then((res) => {
                commit('setAll', res.data)
            });
        }
    }
};
