import AuthService from "@/services/auth.service.js";

export default {

    login({commit}, user) {
        return AuthService.login(user).then(
            user => {
                commit('loginSuccess', user);
                return Promise.resolve(user);
            },
            error => {
                commit('loginFailure');
                return Promise.reject(error);
            }
        );
    },

    logout({commit}) {
        AuthService.logout();
        commit('logout');
    },

    register({commit}, user) {
        return AuthService.register(user).then(
            response => {
                commit('registerSuccess');
                return Promise.resolve(response.data);
            },
            error => {
                commit('registerFailure');
                return Promise.reject(error);
            }
        );
    }

}