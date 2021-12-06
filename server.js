//
// // var http = require('http').Server();
// // var io = require('socket.io')(http);
//
// const app = require("express")()
// let serverOpts = {}
// let protocol = "http"
// const server = require(protocol).createServer(serverOpts, app);
// var Redis = require('ioredis');
// const io = require('socket.io')(server, {
//     cors: {
//         origin: "*",
//         methods: ["GET", "POST"],
//         transports: ['websocket', 'polling'],
//         credentials: true
//     },
//     allowEIO3: true, serveClient: true, autoConnect: true,
// });
// var redis = new Redis();
// redis.subscribe('user-chat');
// redis.on('message', function(channel, message) {
//     console.log('Message recieved: ' + message);
//     console.log('Channel: ' + channel);
//     message = JSON.parse(message);
//     io.emit(channel + ':' + message.event, message.data);
// });
// server.listen(3000, function() {
//     console.log('Listening on Port: 3000');
// });
// var userCount = 0;
// io.sockets.on('connection', function (socket) {
//     userCount++;
//     io.sockets.emit('userCount', { userCount: userCount });
//     socket.on('disconnect', function() {
//         userCount--;
//         io.sockets.emit('userCount', { userCount: userCount });
//     });
// });


// var http = require('http').Server();
// var io = require('socket.io')(http);
const app = require("express")()
let serverOpts = {}
let protocol = "http"
const server = require(protocol).createServer(serverOpts, app);
const io = require('socket.io')(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"],
        transports: ['websocket', 'polling'],
        credentials: true
    },
    allowEIO3: true, serveClient: true, autoConnect: true,
});
var Redis = require('ioredis');

var redis = new Redis();
redis.subscribe('user-chat');
// redis.on('message', function(channel, message) {
//     console.log('Message recieved: ' + message);
//     console.log('Channel: ' + channel);
//     message = JSON.parse(message);
//     io.emit(channel + ':' + message.event, message.data);
// });
let sessionsMap = [];
io.on("connection", function (socket) {
    console.log("Server Connected");
    socket.emit('askForUserId');

    let connectedUserId;
    socket.on("askForUserId", function(user_id) {

        const assignedSocket = sessionsMap.find((item) => item.user_id == user_id);
        connectedUserId = user_id;

        if (assignedSocket) {
            assignedSocket['socket_id'] = socket.id;
        } else {
            sessionsMap.push({'user_id': user_id, 'socket_id': socket.id});
        }
    })

    socket.on("disconnect", function () {
        let filterData = sessionsMap.filter(item => item.user_id !== connectedUserId);
        sessionsMap = filterData;
    });

});
redis.on('message', function (channel, message) {
    console.log('Redis: Message on ' + channel + ' received!');
    message = JSON.parse(message);
    console.log(message.data,"saddique")
    let  userId = message.data.user_id;
    console.log(sessionsMap,"asdhaskjdhakshdkashdkjhaskdhsakhdksjadk")
    let userData = sessionsMap.find(item => item.user_id == userId);
    console.log(userData)
    // io.emit(channel + ':' + message.event, message.data);
    if(userData) {
        io.to(userData.socket_id).emit(channel + ':' + message.event, message.data);
    }
});
server.listen(3000, function() {
    console.log('Listening on Port: 3000');
});
var userCount = 0;
// io.sockets.on('connection', function (socket) {
//     userCount++;
//     io.sockets.emit('userCount', { userCount: userCount });
//     socket.on('disconnect', function() {
//         userCount--;
//         io.sockets.emit('userCount', { userCount: userCount });
//     });
// });




