<template>
    <div class="direct-chat-messages">
        <div class="direct-chat-msg" v-bind:class="mainDivcheckRightLeft(message.user.id, user.id)"
             v-for="message in messages">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name" v-bind:class="nameDivcheckRightLeft(message.user.id, user.id)">{{ message.user.name }}</span>
                <span class="direct-chat-timestamp" v-bind:class="timeDivcheckRightLeft(message.user.id, user.id)">{{ message.created_at}}</span>
            </div>
            <img :src="getImgUrl(message.user.image)" alt="message user image" class="direct-chat-img">
            <div class="direct-chat-text">{{ message.message }}</div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['messages', 'user'],
        methods: {
            getImgUrl(userImageUrl) {
                return userImageUrl;
            },
            mainDivcheckRightLeft(messageUserId, loggedInUser) {
                if (messageUserId == loggedInUser)
                    return "right";
                else
                    return "";
            },
            nameDivcheckRightLeft(messageUserId, loggedInUser) {
                if (messageUserId == loggedInUser)
                    return "pull-right";
                else
                    return "pull-left";
            },
            timeDivcheckRightLeft(messageUserId, loggedInUser) {
                if (messageUserId == loggedInUser)
                    return "pull-left";
                else
                    return "pull-right";
            }
        }
    }
</script>