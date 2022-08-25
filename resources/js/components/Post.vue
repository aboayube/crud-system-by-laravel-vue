<template>
    <div class="container pt-3 ">

        <div class="text-center" v-if="loading">
            <div class="spinner-border position-absolute" role="status">
                <span class="sr-only">Loading..</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6" v-for="post in posts " :key="post.id">
                        <div class="card mt-2" v-if="post.image">
                            
<img :src="`images/`+post.image" >
                        </div>
            <div class="card-body">
                <h4 class="card-title">{{post.title}}</h4>
                <small class="text-muted">{{post.created_at}}</small>
                <p class="catd-text">{{post.descrption}}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-transparent border-top-0">
                <button class="btn-primary btn-sm" @click="editItem(post.id)">Edit</button>
                <button class="btn-danger btn-sm" @click="deleteItem(post.id)">delete</button>
            </div>
            
                    </div>
                </div>
            </div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="" @submit.prevent="addItem">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="title" v-model="title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="7"  v-model="descrption" placeholder="Description.."></textarea>
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" @change="chnageImage($event)">
   </div>

   <button class="btn btn-dark" type="submit">{{edit_id?'update':'save'}}</button>

            </form>
        </div>
    </div>
        </div>
</div>

    </div>
</template>
<style >
img{height: 180px;}
</style>

<script setup>
import { storeToRefs } from 'pinia'
import { PostStore } from '@/store/post/PostStore'

const {posts,title,descrption,edit_id,image,loading}=storeToRefs(PostStore())
const {addItem,fetchPosts,editItem,chnageImage,deleteItem}=PostStore()

fetchPosts();
</script>
