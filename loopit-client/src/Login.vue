<template>
    <div class="col-5 mx-auto py-5 mt-5">
    <h1 class="text-center">Login</h1>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input
            type="email"
            v-model="form.email"
            class="form-control"
            id="email"
          />
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            v-model="form.password"
            class="form-control"
            id="password"
          />
          <span class="text-danger" v-if="errors.password">
            {{ errors.password[0] }}
          </span>
        </div>
        <button @click.prevent="login" class="btn btn-primary btn-block mt-4">
          Login
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Actions from "./api/Actions";

export default {
    emits:["loggedIn"],
    data(){
        return{
            form: {
                email:"",
                password:""
            },
            errors:[]
        }
    },
    methods:{
        login() {
            Actions.login(this.form)
            .then(()=>{
                // alert("success");
                this.$root.$emit("login", true);
                localStorage.setItem("auth","true");
                this.emitter.emit("loggedIn");
                this.$router.push({name:"Dashboard"});
            })
            .catch(error=>{
                if(error.response.status===422){
                    this.errors=error.response.data.errors;
                }
                if(error.response.status===401){
                    this.errors=error.response.data.errors;
                }
            });
        }
    }
}
</script>