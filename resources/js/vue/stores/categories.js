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
            axios.get('/api/youtube/categories').then(res => {
                commit('setAll', res.data);
            });
        },
        // TODO this shouldn't be there
        addToVideo({commit}, data) {
            axios.post('/api/youtube/videos/set-category', {
                videoId: data.videoId,
                categoryId: data.categoryId
            });
        },
        delete({dispatch}, data) {
            axios.delete('/api/youtube/categories/' + data)
                .then(() => {
                    dispatch('load');
                })
        }
    }
};
