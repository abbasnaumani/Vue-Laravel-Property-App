import {ref} from "vue";
import authService from "../services/authService";
import {useRouter} from "vue-router";
import {ApiResponse} from "../constants";
import {useToast} from "vue-toastification";


export const authLogin = (props) => {
    const router = useRouter();
    const toast = useToast();

    const rememberMe = ref(false);
    const verificationCode = ref('');
    const userEmail = ref('');
    const password = ref('');
    const confirmPassword = ref('');
    const phoneNumber = ref('');
    const firstName = ref('');
    const lastName = ref('');
    const encodedToken = ref(props.encodedToken)

    const handleLogin = () => {
        authService.handleLogin(userEmail.value, password.value,rememberMe.value);
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
    const handleForgotPassword = async () => {
        let response = await authService.handleForgotPassword((userEmail.value !== '') ? ({userEmail:userEmail.value ,resendEmail:false}) :({encodedToken:encodedToken,resendEmail:true}));
        if (response.data.status === ApiResponse.SUCCESS) {
            toast.success(response.data.message, {
                timeout: 3500
            });
            await router.push({
                path: '/reset/password'+response.data.data.token
            });
        } else {
            toast.error(response.data.message, {
                timeout: 3500
            });
        }
    }
    const handleUpdatePassword = async () => {
        let response = await authService.handleUpdatePassword({
            verificationCode: verificationCode.value,
            encodedToken: encodedToken.value,
            password: password.value,
            password_confirmation: confirmPassword.value
        });
        console.log(response, "response")
        if (response.data.status === ApiResponse.SUCCESS) {
            toast.success(response.data.message, {
                timeout: 3500
            });
            await router.push({
                path: '/login'
            });
        } else {
            toast.error(response.data.message, {
                timeout: 3500
            });
        }
    }

    return {
        encodedToken,
        rememberMe,
        firstName,
        lastName,
        userEmail,
        phoneNumber,
        password,
        confirmPassword,
        handleForgotPassword,
        handleRegistration,
        handleLogin,
        handleUpdatePassword,
        verificationCode,
    }
}
export default {authLogin}
