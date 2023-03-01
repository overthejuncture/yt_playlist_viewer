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
            console.log(data)
            state.items = data;
        },
        setCurrent(state, data) {
            state.current = data;
        },
    },
    actions: {
        getItems({commit}, filters) {
            axios.get('/api/watch-later/get', {params: filters}).then(res => {
                commit('setAll', res.data);
                commit('setCurrent', res.data[Math.floor(Math.random() * res.data.length)]);
            });
        },
        nextSelected({dispatch}) {
            dispatch('getItems')
        },
    }
};
