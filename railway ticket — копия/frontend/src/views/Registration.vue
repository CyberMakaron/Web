<template>
  <body class="text-center body-auth">
  <form class="form-registration">
    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
<!--    <label for="inputEmail" class="sr-only">Email address</label>-->
    <input type="email" id="inputEmail" class="form-control mb-1" placeholder="Email" required="" autofocus="">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPassword" class="form-control mb-1" placeholder="Пароль" required="">
<!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <input type="password" id="inputPasswordRepeat" class="form-control mb-3" placeholder="Повторите пароль" required="">
    <button class="btn btn-lg btn-danger btn-block" type="submit">Регистрация</button>
  </form>
  </body>
</template>

<script>
export default {
name: "Registration"
}
</script>
