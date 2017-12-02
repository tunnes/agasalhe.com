<div id="chat-controller">
    <div id="chat-modal" class="modal">
        <div class="modal-content">
            <div class="row valign-wrapper" id="chatheader">
                <div class="col s1">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons white-text small">keyboard_arrow_left</i></a>
                </div>
                <div class="col s2">
                    <img class="circle" width="50px" v-bind:src="target_user.picture"/>
                </div>
                <div class="col s9">
                    <h4 class="login-title">{{target_user.username}}</h4>
                    <a href="#">{{target_user.nickname}}</a>
                </div>
            </div>
            <div class="row" id="chatbox">
                <div class="row message-row" v-for="chatMessage in chatMessages">
                    <div class="col m6 offset-m6" v-if="chatMessage.sent_by_sender == '1' " >
                        <div class="my-message">
                            <p>{{chatMessage.description}}</p>
                            <span class="my-message-date message-date">{{chatMessage.created}}</span>
                        </div>
                    </div>
                    <div class="col m6" v-else >
                        <div class="target-message">
                             <p>{{chatMessage.description}}</p>
                             <span class="message-date">{{chatMessage.created}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row valign-wrapper" id="sendmessage">
                <div class="col s11">
                    <div id="messagebox" tabindex="1" v-on:keyup.enter="sendMessage()" contenteditable></div>
                </div>
                <div id="send-button" class="col s1" v-on:click="sendMessage()">
                    <a class=""><i class="material-icons white-text">send</i></a>
                </div>
            </div>
        </div>
    </div>
</div>