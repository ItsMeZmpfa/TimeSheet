export default function authHeader() {
    let token = JSON.parse(localStorage.getItem('SECURITY_TOKEN'));


    return {Authorization: 'Bearer ' + token};

}