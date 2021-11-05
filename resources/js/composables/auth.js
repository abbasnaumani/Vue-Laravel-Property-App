import {ref,computed} from "vue";
import authService from "../services/authService";
import {required, email, minLength, sameAs} from '@vuelidate/validators'
import useVuelidate from '@vuelidate/core'

export const authLogin = (props) => {
    const rememberMe = ref(false);
    const userEmail = ref('abbasnaumani+1@gmail.com');
    const password = ref('12345678');
    const password_confirmation = ref('');
    const phone_number = ref('');
    const first_name = ref('');
    const last_name = ref('');
    const validationRules = computed(() => {
        return {
            userEmail: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(8)
            },
        }
    });
    const $v = useVuelidate(
        validationRules,
        {userEmail, password}
    );
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


    return {
        $v,
        handleLogin,
        handleLogout,
        rememberMe,
        first_name,
        last_name,
        userEmail,
        phone_number,
        password,
        password_confirmation,
        handleRegistration
    }
}
export default {authLogin}
