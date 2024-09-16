import Axios from '@/Helper/axios.js';
import authHeader from "@/services/authHeader.js";

const API_URL = 'http://api.mydomain.test:8000/api/';

class TimeLogService {

    async getTheLatestTimeLogOfEmployerBaseOnMonth(employerTimeRecords) {

        return await Axios.get("/api/getLatestTimeLogRecords", {
            params: employerTimeRecords,
            headers: authHeader()
        }).then(response => {
            if (response.data) {
                return Promise.resolve(response.data["employerRecord"])
            }
        });
    };

}

export default new TimeLogService();