<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header"><h5>Simple Public Chat <small>({{  1 }} users online)</small></h5>
                    </div>

                    <div class="form-group">
                        <div class="form-group col-6 col-lg-3 col-sm-6" v-if="allUsers">
                            <label>&nbsp User</label>
                            <select id="users"
                                    class="form-control form-control-alt form-control-lg"
                                    v-model="userId"
                            >
                                <option v-for="item in allUsers" :value="item.id" :selected="item.id==userId">{{item.first_name+' '+item.last_name}}</option>

                            </select>
                        </div>
<!--                        <div class="form-group p-2">-->
<!--                            <label for="nickname">Your nickname:</label>-->
<!--                            <input type="text" name="nickname" v-model="userName" class="chat-input nickname" required>-->
<!--                        </div>-->
                        <textarea rows="12" readonly="" class="form-control">{{dataMessages.join('\n')}}</textarea>

                        <div class="p-2 message_block">
                            <input type="text" v-model="message" placeholder="Your message" required class="chat-input">
                            <button @click="sendMessage" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
                <div>{{ error }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue';
import axios from "axios";
import {getAgencyUsersList} from "../../composables/user";
import userService from "../../services/userService";
import appApi from "../../../api";
export default {
    name: "UserChat",
    setup(props) {
        const user = ref(1);
        const dataMessages = ref([]);
        const message = ref('');
        const userId = ref(1);
        const userName = ref('');
        // const users = ref('');
        const error = ref('');
        const allUsers = getAgencyUsersList();

        var socket = io.connect('http://127.0.0.1:3000');
        console.log("connect",socket.id,socket);

        // socket.on('userCount', function (data) {
        //     users.value = data.userCount;
        // }.bind());
        socket.on('user-chat:user-chat-event', function (data){
            console.log(data,"hello");
            dataMessages.value.push(data['user_id'] + ' : ' + data['message']);
        }.bind());

        socket.on('askForUserId', () => {
            let user_id = userId.value; // receiver id
            socket.emit('askForUserId',user_id);
            // $("#user_id").html(user_id);
        });

        function sendMessage() {
            if (message.value === "" || userId.value === "") {
                this.error = 'Type-in your nickname and message then click \'Send\'';
            } else {
                // appApi.get('/user/chat/send/message', {message: message.value, user_id: userId.value})
                // axios({
                //     method: 'post',
                //     url: '/user/chat/send/message',
                //     params: {
                //         message: message.value,
                //         user_id: userId.value,
                //     }
                // })
                //     .then((response) => {
                //         message.value = "";
                //     });
                userService.handleUserChat({message:message.value,user_id:userId.value});
            }
        }

        return {
            dataMessages,
            message,
            userId,
            // users,
            error,
            sendMessage,
            allUsers,
            user
        }

    }
}
</script>

<style scoped>

</style>
