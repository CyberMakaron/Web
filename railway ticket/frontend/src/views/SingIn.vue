<template>
  <body class="text-center body-auth">
  <form class="form-signin" @submit="signIn">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
<!--    <label for="inputEmail" class="sr-only">Email address</label>-->
    <input type="email" id="inputEmail" class="form-control mb-1" v-bind:class="edits_status" placeholder="Email" required="" autofocus="" v-model="email" v-on:change="fieldChanged()">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPassword" class="form-control mb-2" v-bind:class="edits_status" placeholder="Пароль" required="" v-model="password" v-on:change="fieldChanged()">
    <div v-bind:class="edits_status" v-if="edits_status != ''">Неверный логин или пароль!</div>
    <div class="checkbox mb-3">
      <label><input type="checkbox" name="remember-me"> Запомнить меня</label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Войти</button>
    <div class="mt-2">
      <router-link class="mr-5" href="" v-bind:to="{name: 'Registration'}">Регистрация</router-link>
      <a class="ml-5" href="">Забыл пароль</a>
    </div>
  </form>
  </body>
</template>

<script>
import Axios from "axios";
import User from "@/components/User";
import router from "@/router";
import MD5 from "crypto-js/md5";
export default {
  name: "SingIn",
  data() {
    return {
      email: '',
      password: '',
      edits_status: ""
    }
  },
  methods: {
    signIn(event){
      this.edits_status = ""
      this.$http.get('/users/login', {params: {
          email: this.email,
          password_md5: MD5(this.password).toString()
        }}).then((response) => {User.login(response.data)
                                router.push({name: 'Home'})})
           .catch((errors) => {console.log(errors)
                               this.edits_status = "border-danger text-danger"})
      event.preventDefault()
    },
    fieldChanged(){
      this.edits_status = "";
    }
  }
}
</script>