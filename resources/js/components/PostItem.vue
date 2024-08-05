<script setup>
import { formatDate } from "@/Utils/date";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    post: Object,
    isOwnPost: Boolean,
});
</script>

<template>
    <li>
        <!-- 自分の投稿の時だけリンクを追加 -->
        <Link :href="`/post/${post.id}`" v-if="isOwnPost">
            ユーザー：{{ post.user.name }}<br />
            投稿内容：{{ post.content }} <br />
            投稿日時：{{ formatDate(post.created_at) }}
        </Link>
        <div v-else>
            ユーザー：{{ post.user.name }}<br />
            投稿内容：{{ post.content }} <br />
            投稿日時：{{ formatDate(post.created_at) }}
        </div>
    </li>
</template>
<style></style>
