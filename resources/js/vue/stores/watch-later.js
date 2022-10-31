export default {
    namespaced: true,
    state() {
        return {
            items: [],
            current: null,
        }
    },
    mutations: {
        setAll(state, data) {
            state.items = data;
        },
        setCurrent(state, data) {
            state.current = data;
        },
    },
    actions: {
        getItems({commit}) {
            axios.get('/api/youtube/watch-later/get').then(res => {
                commit('setAll', res.data);
                commit('setCurrent', res.data[Math.floor(Math.random() * res.data.length)]);
            });
        }
    }
};
