
import Axios from 'axios'

const state = {
    authorTasks: [],
    allTasks: [],
    assigneeTasks: []
};
const getters = {
    authorTasks(state) {
        return state.authorTasks
    },
    allTasks(state) {
        return state.allTasks
    },
    assigneeTasks(state) {
        return state.assigneeTasks
    },
};
const mutations = {
    SET_AUTHOR_TASKS: (state, tasks) => {
        state.authorTasks = tasks;
    },
    SET_ALL_TASKS: (state, tasks) => {
        state.allTasks = tasks;
    },
    SET_ASSIGNEE_TASKS: (state, tasks) => {
        state.assigneeTasks = tasks;
    }
};
const actions = {
    GET_AUTHOR_TASKS: async function(context, payload) {
        let { data } = await Axios.get('/auth/tasks/author');
        context.commit('SET_AUTHOR_TASKS', data.data);
    },
    GET_ALL_TASKS: async function(context, payload) {
        let { data } = await Axios.get('/auth/tasks');
        context.commit('SET_ALL_TASKS', data.data);
    },
    GET_ASSIGNEE_TASKS: async function(context, payload) {
        let { data } = await Axios.get('/auth/tasks/assignee');
        context.commit('SET_ASSIGNEE_TASKS', data.data);
    }
};

export default {
  state,
  getters,
  mutations,
  actions
}
