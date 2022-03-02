<template>
    <div>

        <div class="row">
            <div v-for="post in posts" class="col-md-3">
                <card-item-component v-bind:title="post.title">
                    <template slot="mostrar_mais">
                        <div class="text-end">
                            <a href="#" @click="show(post.id)" data-bs-toggle="modal" data-bs-target="#showModal">+ detalhes</a>
                        </div>
                    </template>
                </card-item-component>
            </div>
        </div>

        <!-- Modal -->
        <modal-component id="showModal">
            <template slot="body">
                <div>
                    <h3>{{post.title}}</h3>
                    <hr>
                </div>

                <p>{{post.body}}</p>

                <div class="mt-5">
                    <h5>Tags:</h5>
                    <ul class="tags">
                        <div v-if="post.tags != ''">
                            <li v-for="tag in post.tags">{{ tag }}</li>
                        </div>
                        <div v-else>
                            <div class="text-danger">Nenhuma tag encontrada!</div>
                        </div>
                    </ul>
                </div>

            </template>
        </modal-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                post: {},
            }
        },
        methods: {
            read() {
                axios.get('/api/posts').then(response => {
                    this.posts = response.data;
                });
            },
            show(id) {
                axios.get(`/api/posts/${id}`).then(response => {
                    this.post = response.data;
                });
            },
        },
        mounted() {
            this.read()
        }
    }
</script>

<style>
    a:link {
        text-decoration: none;
    }
</style>
