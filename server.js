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
redis.on('message', function(channel, message) {
    console.log('Message recieved: ' + message);
    console.log('Channel: ' + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});
server.listen(3000, function() {
    console.log('Listening on Port: 3000');
});
var userCount = 0;
io.sockets.on('connection', function (socket) {
    userCount++;
    io.sockets.emit('userCount', { userCount: userCount });
    socket.on('disconnect', function() {
        userCount--;
        io.sockets.emit('userCount', { userCount: userCount });
    });
});
