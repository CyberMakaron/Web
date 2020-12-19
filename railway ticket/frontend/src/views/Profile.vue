<template>
  <div class="container profile">
    <h4>Имя: {{user.name}}</h4>
    <h4>Email: {{user.email}}</h4>
    <button class="btn btn-danger btn-block col-md-3" v-on:click="logoutClick">Выйти</button>
<!--  <button class="btn btn-danger btn-block btn-bot">Купить билеты</button>-->
  </div>
<!--  <div><button class="btn btn-danger btn-block btn-bot" v-on:click="btnClick">Выйти</button></div>-->
</template>

<script>
import User from "@/components/User";
import router from "@/router";
import MD5 from "crypto-js/md5";

export default {
  name: "Profile",
  data() {
    return {
      user: User
    }
  },
  methods: {
    logoutClick(){
      User.logout()
      router.push({name: 'SingIn'})
    },
    changeUser(){
      let id;
      this.$http.get('users/user', {
        email: this.user.email
      }).then((response) => id = response.data['id'])
      this.$http.put('users/change', {
        id: id,
        name: "username",
        phone: "userPhone",
        email: this.user.email,
        password_md5: MD5("qwerty123").toString()
      })
    }
  }
}
</script>