<div class="container">
    <h1>Team A Score</h1>
    <div id="team1_score"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.socket.io/4.4.0/socket.io.min.js"></script>

<script>
    var sock = io("{{ env('PUBLISHER_URL') }}:{{ env('BROADCAST_PORT') }}");
    // sock.on('action-channel-one:App\\Events\\ActionEvent', function (data){
    sock.on('action-channel-one:action-event', function (data){
        alert("sasas");
        //data.actionId and data.actionData hold the data that was broadcast
        //process the data, add needed functionality here
        var action = data.actionId;
        var actionData = data.actionData;
        if(action == "score_update" && actionData.team1_score) {
            $("#team1_score").html(actionData.team1_score);
        }
    });
</script>
