import TimeLogService from "@/services/timelog.service.js"

export default {

    async getTheLatestTimeLogOfEmployerBaseOnMonth({commit}, employerTimeRecords) {


        return TimeLogService.getTheLatestTimeLogOfEmployerBaseOnMonth(employerTimeRecords).then(
            employerTimeRecords => {
                commit('retrieveSuccess', employerTimeRecords);
                return Promise.resolve(employerTimeRecords);
            },
            error => {
                commit('retrieveFailure');
                return Promise.reject(error);
            }
        );
    },
}