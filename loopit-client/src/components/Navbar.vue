<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <router-link class="navbar-brand" to="/">loopit.co</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link class="nav-link active" to="/">Login</router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                    <router-link class="nav-link" to="dashboard">Dashboard</router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                    <a class="nav-link" @click="logout" to="/">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import Actions from "../api/Actions"

export default {
    name:'Navbar',
    data(){
        return{
            isLoggedIn:false
        }
    },
    mounted(){
        this.emitter.on("loggedIn",()=>{
            this.isLoggedIn=true
        })
    },
    methods:{
        logout(e){
            e.preventDefault()
                Actions.logout()
                .then(()=>{
                    localStorage.removeItem("auth");
                    this.isLoggedIn=false
                    this.$router.push({name:"Login"});
                })
                .catch(()=>{
                    alert("Something went wrong. Please try later")
                })
        }
    }
}
</script>

<style>
a.nav-link{
    cursor:pointer;
}
</style>