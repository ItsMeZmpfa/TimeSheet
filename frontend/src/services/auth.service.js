import Axios from '@/Helper/axios.js';

class AuthService {
    async login(user) {
        await Axios.get("/sanctum/csrf-cookie");

        await Axios.post("/api/login", {
            "email": user.email,
            "password": user.password
        }).then(response => {

            if (response.data.token) {
                localStorage.setItem('SECURITY_TOKEN', JSON.stringify(response.data.token));
            }
        });
    }

    logout() {
        localStorage.removeItem('user');
    }

}

export default new AuthService();