<template>
  <div class="container profile">
    <h4>Имя: {{user.name}}</h4>
    <h4>Email: {{user.email}}</h4>
    <button class="btn btn-danger btn-block col-md-3" v-on:click="btnClick">Выйти</button>
<!--  <button class="btn btn-danger btn-block btn-bot">Купить билеты</button>-->
  </div>
<!--  <div><button class="btn btn-danger btn-block btn-bot" v-on:click="btnClick">Выйти</button></div>-->
</template>

<script>
import User from "@/components/User";
import router from "@/router";

export default {
  name: "Profile",
  data() {
    return {
      user: User
    }
  },
  methods: {
    btnClick(){
      User.logout()
      router.push({name: 'SingIn'})
    }
  }
}
</script>