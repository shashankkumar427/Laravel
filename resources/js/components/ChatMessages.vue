<template>
    <div class="direct-chat-messages">
        <div class="direct-chat-msg" v-for="message in messages">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">{{ message.user.name }}</span>
                <span class="direct-chat-timestamp pull-right">{{ message.created_at }} 23 Jan 2:00 pm</span>
            </div>
            <img :src="getImgUrl(message.user.image)" alt="message user image" class="direct-chat-img">
            <div class="direct-chat-text">{{ message.message }}</div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['messages'],
        methods: {
            getImgUrl(userImageUrl) {
                return userImageUrl;
            }
        }
    };
</script>