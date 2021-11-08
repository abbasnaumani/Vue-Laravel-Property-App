import {ref,computed} from "vue";
import authService from "../services/authService";

export const authLogin = (props) => {
    const rememberMe = ref(false);
    const verificationToken = ref('');
    const userEmail = ref('abbasnaumani+1@gmail.com');
    const password = ref('12345678');
    const password_confirmation = ref('');
    const phone_number = ref('');
    const first_name = ref('');
    const last_name = ref('');

    const handleLogin = () => {
        authService.handleLogin(userEmail.value, password.value,rememberMe.value);
    }
    const handleLogout = () => {
        authService.handleLogout();
    }
    const handleRegistration = () => {
        authService.handleRegistration({
            userEmail: userEmail.value,
            password: password.value,
            password_confirmation:password_confirmation.value,
            phone_number:phone_number.value,
            first_name:first_name.value,
            last_name:last_name.value
        });
    }
    const handleForgotPassword = () => {
        authService.handleForgotPassword(userEmail.value);
    }
    const handleUpdatePassword = () => {
        authService.handleUpdatePassword({
            password: password.value,
            password_confirmation:password_confirmation.value,
        });
    }
    const handleVerificationCode = () => {
        authService.handleVerificationCode(verificationToken.value);
    }

    return {
        $v,
        rememberMe,
        first_name,
        last_name,
        userEmail,
        phone_number,
        password,
        password_confirmation,
        handleForgotPassword,
        handleRegistration,
        handleVerificationCode,
        handleLogin,
        handleLogout
    }
}
export default {authLogin}
