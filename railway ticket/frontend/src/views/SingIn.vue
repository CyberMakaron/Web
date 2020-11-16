<template>
  <body class="text-center body-auth">
  <form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
<!--    <label for="inputEmail" class="sr-only">Email address</label>-->
    <input type="email" id="inputEmail" class="form-control mb-1" placeholder="Email" required="" autofocus="">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Пароль" required="">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember-me"> Запомнить меня
      </label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Войти</button>
<!--    <div class="mt-2"><a class="mr-5" href="">Регистрация</a><a class="ml-5" href="">Забыл пароль</a></div>-->
    <div class="mt-2"><router-link class="mr-5" href="" v-bind:to="{name: 'Registration'}">Регистрация</router-link><a class="ml-5" href="">Забыл пароль</a></div>
  </form>
  </body>
</template>

<script>
export default {
  name: "SingIn"
}
</script>