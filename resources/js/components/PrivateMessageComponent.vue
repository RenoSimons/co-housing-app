<template>
    <div class="right-chat">
        <div class="top">
            <span>Aan: <span class="name">
                <span :class="{'text-danger':session.block}">
                {{friend.name}} <span v-if="isTyping">is Typing</span>
                <span v-if="session.block" class="text-danger">(geblokkeerd)</span>
            </span>
            </span>
            </span>
            <a href="" @click.prevent="close">
                <i class="fa fa-times" style="float: right; color: #6b6b6b; margin-left: 10px" aria-hidden="true"></i>
            </a>
            <div style="float: right; margin-right: 10px"  class="dropdown">
                <i class="fa fa-ellipsis-v" style=" color: #6b6b6b" aria-hidden="true"></i>
                <div class="dropdown-content">
                    <a href="#" class="block" v-if="session.block && can" @click.prevent="unblock">Hef blokkeer op</a>
                    <a href="#" class="block" @click.prevent="block" v-if="!session.block">Blokkeer</a>
                </div>
            </div>

        </div>

        <div class="chat" style="overflow-y: scroll;" v-chat-scroll>
            <div v-for="chat in chats" :key="chat.id">
                <div class="card-text" :class="chat.user_id == auth.id ? 'd-flex justify-content-end' : ''">
                    <p :class="chat.user2_id == auth.id ? 'bubble-you p-2' : 'bubble-me p-2'">
                     
                        {{chat.message}}

                        <br>
                        <span v-if="chat.user2_id == auth.id" style="font-size:10px">send {{chat.send_at}}</span>

                        <br>
                        <i v-if="chat.read_at!=null" class="fa fa-check" style="color: #fff9fe" aria-hidden="true">
                            <span style="font-size:10px">read {{chat.read_at}}</span>
                        </i>
                    </p>
                </div>
            </div>
        </div>

        <div class="write">
            <form class="card-footer"  @submit.prevent="send">
                <a class="write-link attach"></a>
                <div class="d-flex center-align">
                    <a type="submit" style="cursor: pointer" @click.prevent="send" class="send-chat-btn">
                        <img src="/images/icons/send.png" alt="send button" style="width: 15px;">
                    </a>
                    <input type="text" placeholder="Schrijf een bericht..."
                        :disabled="session.block"
                        v-model="message" />
                </div>
            </form>
        </div>
    </div>
</template>



<script>
    export default {
        props: ['friend'],
        data() {
            return {
                chats: [],
                message: null,
                isTyping: false,
                auth: []
            }
        },
        watch: {
            message(value) {
                if (value) {
                    Echo.private(`Chat.${this.friend.session.id}`).whisper("typing", {
                        name: this.auth.name
                    });
                }
            }
        },
        computed: {
            session() {
                return this.friend.session;
            },
            can() {
                return this.session.blocked_by == this.auth.id;
            }
        },
        created() {
            this.read();
            this.getAuth();
            this.getAllMessages();
            Echo.private(`Chat.${this.friend.session.id}`).listen(
                "PrivateChatEvent",
                e => {
                    this.friend.session.open ? this.read() : "";
                    this.chats.push({ message: e.content, type: 1, send_at: "Zonet" });
                }
            );
            Echo.private(`Chat.${this.friend.session.id}`).listen("MsgReadEvent", e =>
                this.chats.forEach(
                    chat => (chat.id == e.chat.id ? (chat.read_at = e.chat.read_at) : "")
                )
            );
            Echo.private(`Chat.${this.friend.session.id}`).listen(
                "BlockEvent",
                e => (this.session.block = e.blocked)
            );
            Echo.private(`Chat.${this.friend.session.id}`).listenForWhisper(
                "typing",
                e => {
                    this.isTyping = true;
                    setTimeout(() => {
                        this.isTyping = false;
                    }, 2000);
                }
            );
        },
        methods: {
            getAuth() {
                axios.post("/getUser").then(res => {
                    this.auth = res.data;
                });
            },
            getAllMessages() {
                axios
                    .post(`/session/${this.friend.session.id}/chats`)
                    .then(res => (this.chats = res.data.data));
            },
            send() {
                if (this.message) {
                    this.pushToChats(this.message);
                    axios
                        .post(`/send/${this.friend.session.id}`, {
                            message: this.message,
                            to_user: this.friend.id
                        })
                        .then(res => (this.chats[this.chats.length - 1].id = res.data));
                    this.message = null;
                }
            },
            pushToChats(message) {
                this.chats.push({
                    message: message,
                    type: 0,
                    user_id: this.auth.id,
                    user2_id: 0,
                    read_at: null,
                    send_at: "Just now"
                });
            },
            close() {
                this.$emit('close');
            },
            clear() {
                axios.post(`session/${this.friend.session.id}/clear`).then(res => {
                    this.chats = [];
                })
            },
            block() {
                this.session.block = true;
                axios
                    .post(`/session/${this.friend.session.id}/block`)
                    .then(res => (this.session.blocked_by = this.auth.id));
            },
            unblock() {
                this.session.block = false;
                axios.post(`session/${this.friend.session.id}/unblock`).then(
                    res => {
                        this.session.blocked_by = null;
                    }
                );
            },
            read() {
                axios.post(`/session/${this.friend.session.id}/read`);
            }
        },
    };
</script>

<style>
    
</style>