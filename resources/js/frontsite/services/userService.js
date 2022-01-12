import EventEmitter from "events";
import appApi from "../../api";
import errorHandlerService from "~/frontsite/services/errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/frontsite/router";
const toast = useToast();
import store from "../store";
import agencyService from "../../admin/services/agencyService";

class UserService extends EventEmitter {
    async getAgencyUsersList() {
        try {
            const response = await appApi.get('/user/list');
                // toast.success(response.data.message);
                await store.dispatch('actionUsers', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async getAllRoles() {
        try {
            const response = await appApi.get('/roles');
                // toast.success(response.data.message);
                await store.dispatch('actionRoles', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleAddAgencyUser(agencyUserData) {
        try {
            const response = await appApi.post('/user/add',agencyUserData);
                toast.success(response.data.message);
                // await store.dispatch('setUsers', response.data.payload);
                router.push({name: 'user-list'});
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleUpdateAgencyUser(userData,userId) {
        try {
            const response = await appApi.put('/user/'+userId,userData);
            toast.success(response.data.message);
            await this.getAgencyUsersList()
            router.push({name: 'user-list'});
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleUserChat(data){
        try {
            console.log(data,"Asdsadas");
            const response = await appApi.post('/user/chat/send/message',data);
            toast.success(response.data.message);
            // await store.dispatch('actionUserMenu', response.data.payload);
        } catch (err) {
            console.log(err, "err err");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async deleteUser(userId){
        try {
            const response = await appApi.delete('/user/'+userId);
                toast.success(response.data.message, );
                await this.getAgencyUsersList()
                return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async updateUserProfile(profileData){
        try {
            const response = await appApi.put('/user/update/profile',profileData);
                await store.dispatch('actionProfile', response.data.payload);
                toast.success(response.data.message, );
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async updatePassword(passwordData){
        try {
            const response = await appApi.put('/user/update/password',passwordData);
                toast.success(response.data.message, );
                return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
}

const service = new UserService();
export default service;
