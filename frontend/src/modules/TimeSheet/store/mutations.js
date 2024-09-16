import * as types from "./mutations-types.js";

export default {

    [types.RETRIEVE_SUCCESS](state, user) {
        state.employerTimeRecords = user;
        state["status"].retrieveData = true
    },

    [types.RETRIEVE_FAIL](state) {
        state.employerTimeRecords = false;
        state["status"].retrieveData = false
    },

};
