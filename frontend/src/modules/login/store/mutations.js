import * as types from "./mutations-types.js";

export default {

    [types.LOGIN_SUCCESS](state, user) {
        state.user = user;
        state["status"].loggedIn = true
    },

    [types.LOGIN_FAIL](state) {
        state.user = false;
        state["status"].loggedIn = false
    },

    [types.LOGOUT](state) {
        state.user = false;
        state["status"].loggedIn = false
    },

    [types.REGISTER_SUCCESS](state) {
        state.user = false;
        state["status"].loggedIn = false
    },

    [types.REGISTER_FAIL](state) {
        state.user = false;
        state["status"].loggedIn = false
    },


};
