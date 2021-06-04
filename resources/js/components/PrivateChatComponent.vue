<template>
    <div class="wrapper" id="chat-window">
        <div class="container d-flex justify-content-between p-0">
            <div class="left">
                <div class="top">

                </div>
                <ul class="people">
                    <li class="person" @click.prevent="openChat(friend)"  v-for="friend in friends" :key="friend.id">
                        <div v-if="friend.id !== auth.id">
                            <div class="d-flex">
                                <p class="mb-0"><span class="name"> {{friend.name}}</span></p> 
                                <span class="ml-2" v-if="friend.session && friend.session.unreadCount > 0">{{friend.session.unreadCount}}</span>
                            </div>
                            <p v-if="friend.online"><small  class="preview" style="color:#00b0ff" >Online</small></p>
                            <p v-else><small  class="preview" >Offline</small></p>
                        </div>
                    </li>
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
                axios.post("/getUser").then(res => {
                    this.auth = res.data;
                });
            },
            getFriends() {
                axios.post("/getFriends").then(res => {
                    console.log(res.data.data)
                    this.friends = res.data.data;
                    this.friends.forEach(
                        friend => (friend.session ? this.listenForEverySession(friend) : "")
                    );
                });
            },
            openChat(friend) {
                console.log(friend.session)
                if (friend.session) {
                    this.friends.forEach(
                        friend => (friend.session ? (friend.session.open = false) : "")
                    );
                    friend.session.open = true;
                    friend.session.unreadCount = 0;
                } else {
                    this.createSession(friend);
                }
            },
            createSession(friend) {
                console.log(friend)
                axios.post("/session/create", { friend_id: friend.id }).then(res => {
                    (friend.session = res.data.data), (friend.session.open = true);
                });
            },
            listenForEverySession(friend) {
                Echo.private(`Chat.${friend.session.id}`).listen(
                    "PrivateChatEvent",
                    e => (friend.session.open ? "" : friend.session.unreadCount++)
                );
            }
        },
        created() {
            console.log(this.auth)
            this.getAuth();

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
        mounted() {
            this.getFriends();
        },
        components: { PrivateMessageComponent }
    };
</script>