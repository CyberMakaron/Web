<template>
  <body class="text-center body-auth">
  <form class="form-signin" @submit="signIn">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
<!--    <label for="inputEmail" class="sr-only">Email address</label>-->
    <input type="email" id="inputEmail" class="form-control mb-1" placeholder="Email" required="" autofocus="" v-model="email">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Пароль" required="" v-model="password">
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
// import User from '@/components/user/user'
import Axios from "axios";
import User from "@/components/User";
import router from "@/router";
export default {
  name: "SingIn",
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    signIn(event) {
      User.login({name : this.email,
                       email : this.email,
                       accessToken : '218f94b634b1e70cefe4ecf97adc05aa' });
      //TODO добить CORS (кроссдоменный POST)
        // const instance = Axios.create({
        //   baseURL: 'http://localhost:8000/v1'
        // });
        // instance.post('/user/login', {
        //   email: this.email,
        //   password: this.password
        // }).then((response) => {User.login(response.data); })
        //   //.catch((errors) => {/*TODO обработать ошибку*/})
      router.push({name: 'Home'})
    }
  }
}
</script>