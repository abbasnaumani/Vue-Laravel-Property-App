import EventEmitter from "events";
import appApi from "~/api";
import { ApiResponse } from "~/constants";
import store from "~/frontsite/store";
import errorHandlerService from "~/frontsite/services/errorHandlerService";
import { useToast } from "vue-toastification";
import router from "~/frontsite/router";
import {getParentTypes} from "../composables/property";

const toast = useToast();

class PropertyService extends EventEmitter {
    async getPropertiesBySlug(slug,paginateData) {
        let filters = store.getters.getPropertySearchFilters;
        console.log(filters,"filtersfiltersfiltersfiltersfiltersfiltersfiltersfiltersfiltersfilters")
        try {
            const response = await appApi.get('/' + slug + '/properties', {
                params: {
                    current_page: paginateData.currentPage,
                    per_page: paginateData.perPage,
                    add_more: paginateData.addMore,
                    type_id: (filters && filters.type_id > 0) ? filters.type_id : null,
                    location_id: (filters && filters.location_id > 0) ? filters.location_id : null,
                    beds: (filters && filters.beds > 0) ? filters.beds : null,
                    min_price: (filters && filters.min_price > 0) ? filters.min_price : null,
                    max_price: (filters && filters.max_price > 0) ? filters.max_price : null
                }
            });
            // await store.dispatch('actionSearchFilter', null);
            return response.data.payload;

        } catch (err) {
            // console.log(err, "err err")
            router.push({ name: 'not-found' });
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getPropertyById(propertyId) {
        try {
            const response = await appApi.get('/property/' + propertyId)
                return response.data.payload;
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
                await store.dispatch('actionPropertyTypes', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getParentTypes(){
        try {
            const response = await appApi.get('/property/parent/types');
                await store.dispatch('actionPropertyParentTypes', response.data.payload);

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getAreaUnits() {
        try {
            const response = await appApi.get('/property/area/unit');
                await store.dispatch('actionAreaUnits', response.data.payload);

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async handleAddProperty(newProperty) {
        try {
            const response = await appApi.post('/properties', newProperty);
                toast.success(response.data.message);
                return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async deleteProperty(propertyId) {
        try {
            const response = await appApi.delete('/properties/' + propertyId);
                toast.success(response.data.message, );
                return response.data;

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async handleUpdateProperty(dataToUpdate, propertyId) {
        try {
            const response = await appApi.put('/properties/' + propertyId, dataToUpdate);
                await store.dispatch('actionPropertyList', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }

    async handleImages(dataFiles, fileProgress, propertyId) {
        const files = dataFiles.value;
        try {
            for (let i = 0; i < files.length; i++) {
                var formData = new FormData();
                //console.log(`files`, files[i])
                formData.append("images", files[i]);
                formData.append('property_id', propertyId);
                const response = await appApi.post('/uploads', formData, {
                    onUploadProgress: async(progressEvent) => {
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
                    // await this.getPropertiesBySlug();
                    // router.push({ name: 'property-dashboard' })
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
