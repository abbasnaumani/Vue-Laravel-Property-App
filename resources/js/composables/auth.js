import {ref,computed} from "vue";
import authService from "../services/authService";

export const authLogin = (props) => {
    const rememberMe = ref(false);
    const verificationToken = ref('');
    const userEmail = ref('');
    const password = ref('');
    const confirmPassword = ref('');
    const phoneNumber = ref('');
    const firstName = ref('');
    const lastName = ref('');

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
            password_confirmation:confirmPassword.value,
            phone_number:phoneNumber.value,
            first_name:firstName.value,
            last_name:lastName.value
        });
    }
    const handleForgotPassword = () => {
        authService.handleForgotPassword(userEmail.value);
    }
    const handleUpdatePassword = () => {
        authService.handleUpdatePassword({
            password: password.value,
            password_confirmation:confirmPassword.value,
        });
    }
    const handleVerificationCode = () => {
        authService.handleVerificationCode(verificationToken.value);
    }

    return {
        rememberMe,
        firstName,
        lastName,
        userEmail,
        phoneNumber,
        password,
        confirmPassword,
        handleForgotPassword,
        handleRegistration,
        handleVerificationCode,
        handleLogin,
        handleLogout
    }
}
export default {authLogin}
