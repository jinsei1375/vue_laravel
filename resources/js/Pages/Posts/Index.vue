<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";
import { ref } from "vue";

const props = defineProps({
    posts: Array,
});
const posts = ref(props.posts);

const fetchMyPosts = async () => {
    try {
        const response = await axios.get("/my-posts");
        posts.value = response.data;
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <div>
            <h1>投稿一覧</h1>
        </div>
        <div>
            <button @click="fetchMyPosts">自分の投稿を表示</button><br />
            <!-- /postsに遷移 -->
            <button @click="$inertia.visit(route('posts.index'))">
                全ての投稿を表示
            </button>
        </div>
        <div v-if="posts.length === 0">投稿がありません</div>
        <ul v-else>
            <li v-for="post in posts" :key="post.id">
                <!-- <router-link :to="{ name: 'posts.show', params: { id: post.id } }"> -->
                ユーザー：{{ post.user.name }}<br />
                投稿内容：{{ post.content }}
                <!-- </router-link> -->
            </li>
        </ul>
    </AuthenticatedLayout>
</template>

<style>
h1 {
    margin-bottom: 20px;
    text-align: center;
}
li {
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    padding-bottom: 10px;
}
</style>
