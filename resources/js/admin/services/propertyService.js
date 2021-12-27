import EventEmitter from "events";
import appApi from "~/api";
import {ApiResponse} from "../constants";
import store from "../store";
import errorHandlerService from "~/admin/services/errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/admin/router";

const toast = useToast();

class PropertyService extends EventEmitter {
    async getUserPropertyList() {
        try {
            const response = await appApi.get('/user/properties');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionPropertyList', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getPropertiesBySlug(slug,paginateData) {
        try {
            const response = await appApi.get('/'+slug+'/properties', {
                params: {
                    current_page: paginateData.currentPage,
                    per_page: paginateData.perPage
                }
                });
            if (response.data.status === ApiResponse.SUCCESS) {
                // await store.dispatch('actionPropertiesBySlug', response.data.payload);
                return response.data.payload;
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getPropertyById(propertyId) {
        try {
            const response = await appApi.get('/property/'+propertyId)
            if (response.data.status === ApiResponse.SUCCESS) {
                // await store.dispatch('actionPropertiesBySlug', response.data.payload);
                return response.data.payload;
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getPropertyTypes() {
        try {
            const response = await appApi.get('/property/types');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionPropertyTypes', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getAreaUnits(){
        try {
            const response = await appApi.get('/property/area/unit');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAreaUnits', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async handleAddProperty(newProperty){
        try {
            const response = await appApi.post('/properties',newProperty);
            if (response.data.status === ApiResponse.SUCCESS) {
                // await store.dispatch('actionPropertyList', response.data.payload.data);
                return response.data;
                 // router.push({name: 'property-dashboard'});
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async deleteProperty(propertyId){
        try {
            const response = await appApi.delete('/properties/'+propertyId);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message, );
                return response.data;
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async handleUpdateProperty(dataToUpdate,propertyId){
        try {
            const response = await appApi.put('/properties/'+propertyId,dataToUpdate);
            if (response.data.status === ApiResponse.SUCCESS) {
                // await store.dispatch('actionPropertyList', response.data.payload);
               await this.getUserPropertyList();
                router.push({name: 'property-dashboard'});
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }

    async handleImages(dataFiles,fileProgress,propertyId){
        const files = dataFiles.value;
        try {
            for (let i = 0; i < files.length; i++) {
                var formData = new FormData();
                //console.log(`files`, files[i])
                formData.append("images", files[i]);
                formData.append('property_id',propertyId);
                const response = await appApi.post('/uploads', formData, {
                    onUploadProgress: async (progressEvent) => {
                        console.log('progressEvent', progressEvent);
                        const total = progressEvent.total;
                        const totalLength = progressEvent.lengthComputable ? total : null;
                        if (totalLength !== null) {
                            fileProgress.value[i] = Math.round(
                                (Math.round(progressEvent.loaded * 100) / totalLength));
                        }
                    },
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log('_________________________________________');
                console.log(response);
                if (response.data.status === ApiResponse.SUCCESS) {
                    // toast.success("Image Uploaded!");
                    await this.getUserPropertyList();
                    router.push({name: 'property-dashboard'})
                } else {
                    toast.error(response.data.message);
                }
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new PropertyService();
export default service;
