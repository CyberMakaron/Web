<template xmlns="http://www.w3.org/1999/html">
  <div class="mt-5 container">
  <div class="profile row">
<!--    <div class="col-6"><img src='../assets/profile_img.jpg'></div>-->
    <div class="col-1"></div>
    <div class="col-3"><img src='../assets/profile_img.jpg' style="height: 300px;"></div>
    <div class="col-7">
      <div class="text-right">
        <div class="mb-3" v-if="isDisable===null">Введите данные, который хотите изменить</div>
        <div class="mb-3">Имя <input v-bind:disabled="isDisable" v-model="uname"></div>
        <div class="mb-3">Адерс электронной почты <input v-bind:disabled="isDisable" v-model="email"></div>
        <div class="mb-3">Номер телефона <input v-bind:disabled="isDisable" v-model="phone"></div>
        <div class="mb-3" v-if="isDisable===null">Пароль <input v-model="password1" v-bind:class="edits_status" v-on:change="fieldChanged()"></div>
        <div class="mb-3" v-if="isDisable===null">Потверждение пароля <input v-model="password2" v-bind:class="edits_status" v-on:change="fieldChanged()"></div>
        <div class="mb-3" v-if="isDisable===null">
          <button class="btn btn-outline-dark btn-sm mr-3" v-on:click="changeUser">Сохранить</button>
          <button class="btn btn-outline-dark btn-sm" v-on:click="changeBtn">Отмена</button>
        </div>
        <div class="mb-3 text-right"><button class="btn btn-outline-dark btn-sm" v-on:click="changeBtn">Редактировать данные</button></div>
        <div class="text-right"><button class="btn btn-danger btn-sm" v-on:click="logoutClick">Выйти</button></div>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
  </div>
</template>

<script>
import User from "@/components/User";
import router from "@/router";
import MD5 from "crypto-js/md5";

export default {
  name: "Profile",
  data() {
    return {
      // user: User,
      isDisable: "",
      password1: "",
      password2: "",
      uname: User.name,
      email: User.email,
      phone: User.phone,
      edits_status: ""
    }
  },
  created: {

  },
  methods: {
    logoutClick(){
      User.logout()
      router.push({name: 'SingIn'})
    },
    changeBtn(){
      this.edits_status = ""
      this.password1 = ""
      this.password2 = ""
      this.uname = User.name
      this.email = User.email
      this.phone = User.phone
      if (this.isDisable === null)
        this.isDisable = ""
      else
        this.isDisable = null
    },
    changeUser(){
      // let id;
      // this.$http.get('users/user', {
      //   email: this.user.email
      // }).then((response) => id = response.data['id'])
      if (this.password1 !== this.password2) {
        this.edits_status = "border-danger text-danger"
        return
      }
      let pass = null
      if (this.password1 !== "")
        MD5(this.password1).toString()
      console.log(this.uname)
      if (this.uname === User.name) this.uname = null
      console.log(this.uname)
      if (this.email === User.email) this.email = null
      if (this.phone === User.phone) this.phone = null
      this.$http.put('users/change', {
          id: User.id,
          name: this.uname,
          phone: this.phone,
          email: this.email,
          password_md5: pass
        }).then((response)=>{User.login(response.data)}).catch((errors)=>console.log(errors))
      alert('Обновите страницу')
      // location = location
      this.changeBtn()
    },
    fieldChanged(){
      this.edits_status = ""
    }
  }
}
</script>