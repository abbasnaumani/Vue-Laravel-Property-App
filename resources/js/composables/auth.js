import {ref} from "vue";
import authService from "../services/authService";
import {ApiResponse} from "../constants";
import {useRouter} from "vue-router";

export const authLogin = (props) => {
    const email = ref('');
    const password = ref('');
    const password_confirmation = ref('');
    const phone_number = ref('');
    const first_name = ref('');
    const last_name = ref('');
    const router = useRouter();
    const handleLogin = () => {
        authService.handleLogin(email.value, password.value);
    }
    const handleLogout = () => {
        authService.handleLogout();
    }
    const handleRegistration = () => {
        authService.handleRegistration({
            email: email.value,
            password: password.value,
            password_confirmation:password_confirmation.value,
            phone_number:phone_number.value,
            first_name:first_name.value,
            last_name:last_name.value
        });
    }
    authService.addListener('loginSuccess',(data)=>{
        if(data.status === ApiResponse.SUCCESS_CODE){
            router.push({
                path: `/dashboard`
            });
        }
    })
    authService.addListener('logoutSuccess',(data)=>{
        if(data.status === ApiResponse.SUCCESS_CODE){
            router.push({
                path: '/login'
            });
        }
    })
    return {
        handleLogin,
        handleLogout,
        first_name,
        last_name,
        email,
        phone_number,
        password,
        password_confirmation,
        handleRegistration
    }
}
export default {authLogin}
