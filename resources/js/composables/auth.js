import {ref} from "vue";
import authService from "../services/authService";
import {useRouter} from "vue-router";
import {ApiResponse} from "../constants";
import {useToast} from "vue-toastification";


export const authLogin = (props) => {
    const router = useRouter();
    const toast = useToast();
    const verificationCode = ref('');
    const userEmail = ref('');
    const password = ref('');
    const confirmPassword = ref('');
    const phoneNumber = ref('');
    const firstName = ref('');
    const lastName = ref('');
    const encodedToken = ref(props.encodedToken)






    return {

    }
}
export default {authLogin}
