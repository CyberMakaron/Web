<template>
  <body class="text-center body-auth">
  <form class="form-registration" @submit="registration">
    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
<!--    <label for="inputEmail" class="sr-only">Email address</label>-->
    <input type="email" id="inputEmail" class="form-control mb-1"  v-bind:class="email_status" placeholder="Email" required="" autofocus="" v-model="email" v-on:change="fieldChanged()">
    <div v-bind:class="email_status" v-if="warning==1||warning==3">Такой email занят!</div>
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPassword" class="form-control mb-1" v-bind:class="passwords_status" placeholder="Пароль" required="" v-model="password" v-on:change="fieldChanged()">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPasswordRepeat" class="form-control mb-1" v-bind:class="passwords_status" placeholder="Повторите пароль" required="" v-model="rep_password" v-on:change="fieldChanged()">
    <div v-bind:class="passwords_status" v-if="warning==2||warning==3">Пароли не совпадают!</div>
    <button class="btn btn-lg btn-danger btn-block mt-3" type="submit">Регистрация</button>
  </form>
  </body>
</template>

<script>
import User from "@/components/User";
import Axios from "axios";
import router from "@/router";
import MD5 from "crypto-js/md5";

export default {
  name: "Registration",
  data(){
    return {
      email: "",
      password: "",
      rep_password: "",
      email_status: "",
      passwords_status: "",
      warning: 0,
    }
  },
  methods: {
    registration(event){
      this.warning = 0
      if (this.password != this.rep_password){
        this.passwords_status = "border-danger text-danger";
        this.warning += 2
      }
      this.$http.post('/users/registration', {
        email: this.email,
        password_md5: MD5(this.password).toString()
      }).then((response) => { if (this.warning == 0) {
                                User.login(response.data)
                                router.push({name: 'Home'})}})
          .catch((errors) => {console.log(errors)
                              this.warning += 1
                              this.email_status = "border-danger text-danger"})
      //  console.log('logiruy:' + this.data)
      // if (this.data != null) {
      //   //User.login(data);
      //   router.push({name: 'Home'})
      // } else {
      //   this.email_status = "border-danger text-danger";
      //   this.warning = 1
      // }
      event.preventDefault()
    },
    fieldChanged(){
      this.warning = 0
      this.email_status = "";
      this.passwords_status = "";
    }
  }
}
</script>
