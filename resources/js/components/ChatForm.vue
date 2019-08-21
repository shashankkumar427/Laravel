<template>
    <div class="input-group">
        <input @keyup.enter="sendMessage" class="form-control" id="btn-input" name="message"
               placeholder="Type Message ..." type="text" v-model="newMessage">
        <span class="input-group-btn">
                <button @click="sendMessage" class="btn btn-primary btn-flat" type="button">Send</button>
                </span>
    </div>
</template>
<script>
    export default {
        props: ['user'],
        data() {
            return {
                newMessage: ''
            }
        },
        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });
                this.newMessage = ''
            }
        }
    }
</script>