<template>
    <div class="wrapper" id="chat-window">
        <div class="container d-md-flex justify-content-between p-0">
            <div class="left">
                <div class="top"></div>
                <ul class="people">
                    <div v-if="friends.length == 0">
                        <h4>Je hebt nog geen connecties gelegd</h4>
                        <p>Reageer op een zoekertje of contacteer een persoon</p>
                    </div> 
                    <div v-for="friend in friends" :key="friend.id">
                        <div v-if="friend.id !== auth.id">
                            <li class="person" @click.prevent="openChat(friend)" >
                                <div class="d-flex justify-content-between">
                                    <div class="mb-0 d-flex justify-content-between w-100">
                                        <span class="name"> {{friend.name}}</span>
                                        <div v-if="friend.has_unread_message == 1" class="notification-circle-chat ml-1"></div>
                                    </div> 
                                </div>
                                <p v-if="friend.online"><small  class="preview" style="color:#00b0ff" >Online</small></p>
                                <p v-else><small  class="preview">Offline</small></p>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
            <div id="chat-box">
                <div v-for="friend in friends" :key="friend.id">
                    <div v-if="friend.session">
                        <private-message-component v-if="friend.session.open" @close="close(friend)" :friend="friend">

                        </private-message-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PrivateMessageComponent from "./PrivateMessageComponent";
    import { in_production } from "../app";

    export default {
        data() {
            return {
                friends: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                auth: []
            };
        },
        methods: {
            close(friend) {
                friend.session.open = false;
            },
            getAuth() {
                axios.post((in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/getUser' : '/getUser')).then(res => {
                    this.auth = res.data;
                });
            },
            getFriends() {
                axios.post((in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/getfriends' : '/getfriends')).then(res => {
                    this.friends = res.data.data;
                    this.friends.forEach(
                        friend => (friend.session ? this.listenForEverySession(friend) : "")
                    );
                });
            },
            openChat(friend) {
                if (friend.session) {
                    this.friends.forEach(
                        friend => (friend.session ? (friend.session.open = false) : "")
                    );
                    friend.session.open = true;
                    friend.session.unreadCount = 0;
                    
                    axios.post((in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/markread' : '/markread'), { friend_id: friend.id }).then(res => {
                        //console.log(res);
                    });
                } else {
                    
                    this.createSession(friend);
                }
            },
            createSession(friend) {
                axios.post((in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/session/create' : '/session/create'), { friend_id: friend.id }).then(res => {
                    (friend.session = res.data.data), (friend.session.open = true);
                });
            },
            listenForEverySession(friend) {
                Echo.private(`Chat.${friend.session.id}`).listen(
                    "PrivateChatEvent",
                    e => (friend.session.open ? "" : friend.session.unreadCount++)
                );
            },
        },
        created() {
            this.getAuth();
            this.getFriends();

            Echo.channel("Chat").listen("SessionEvent", e => {
                let friend = this.friends.find(friend => friend.id == e.session_by);
                friend.session = e.session;
                this.listenForEverySession(friend);
            });
            Echo.join(`Chat`)
                .here(users => {
                    this.friends.forEach(friend => {
                        users.forEach(user => {
                            if (user.id == friend.id) {
                                friend.online = true;
                            }
                        });
                    });
                })
                .joining(user => {
                    this.friends.forEach(
                        friend => (user.id == friend.id ? (friend.online = true) : "")
                    );
                })
                .leaving(user => {
                    this.friends.forEach(
                        friend => (user.id == friend.id ? (friend.online = false) : "")
                    );
                });
        },
        components: { PrivateMessageComponent }
    };
</script>