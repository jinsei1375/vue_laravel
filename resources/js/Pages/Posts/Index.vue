<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import axios from "axios";
import { ref } from "vue";
import { formatDate } from "@/Utils/date";

const props = defineProps({
    posts: Array,
});
const posts = ref(props.posts);

console.log(posts.value);

const fetchAllPosts = async () => {
    try {
        const response = await axios.get("/all-posts");
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
            <button @click="fetchAllPosts">他ユーザー含む全投稿を表示</button>
            <!-- /postsに遷移 -->
            <button @click="$inertia.visit(route('posts.index'))">
                自分の投稿を表示
            </button>
            <!-- route('posts.create')に遷移するボタンを追加 -->
            <button @click="$inertia.visit(route('create.post.get'))">
                投稿追加
            </button>
        </div>
        <div v-if="posts.length === 0">投稿がありません</div>
        <ul v-else>
            <li v-for="post in posts" :key="post.id">
                <!-- 自分の投稿の時だけリンクを追加 -->
                <Link
                    :href="`/post/${post.id}`"
                    v-if="
                        $page.props.auth.user &&
                        post.user_id === $page.props.auth.user.id
                    "
                >
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
button {
    margin: 10px;
    border: 1px solid #ccc;
}
</style>
