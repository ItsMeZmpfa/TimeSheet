import Axios from "axios";

const baseUrl = import.meta.env.BASE_URL;

const axiosIns = Axios.create({

    baseURL: "http://api.mydomain.test:8000",
    withCredentials: true,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    withXSRFToken: true,


});

export default axiosIns;