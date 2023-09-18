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
    getters: {
        async getRandomVideoWithoutCategories() {
            return axios.get('/api/videos/getRandomVideoWithoutCategories');
        },
    },
    actions: {
        setItems({commit}, data) {
            commit('setAll', data);
        },
        getItems({commit}, filters) {
            axios.get('/api/videos/get', {params: filters}).then(res => {
                commit('setAll', res.data);
                commit('setCurrent', res.data[Math.floor(Math.random() * res.data.length)]);
            });
        },
        nextSelected({dispatch}) {
            dispatch('getItems')
        },
    }
};
