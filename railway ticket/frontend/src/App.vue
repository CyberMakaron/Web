<template>
  <div id="app" class="wrapper bg_gray">
    <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
<!--        <div class="container">-->
          <router-link class="navbar-brand mx-5" v-bind:to="{name: 'Home'}">ЖД Билеты</router-link>
<!--          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"-->
<!--                  aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--          </button>-->
<!--          <div class="collapse navbar-collapse" id="navbarCollapse">-->
<!--            <ul class="navbar-nav mr-auto">-->
<!--              <li class="nav-item active">-->
<!--                <router-link class="nav-link" v-bind:to="{name: 'Catalog'}">Каталог</router-link>-->
<!--              </li>-->
<!--              <li class="nav-item">-->
<!--                <router-link class="nav-link" v-bind:to="{name: 'Delivery'}">Доставка и оплата</router-link>-->
<!--              </li>-->
<!--              <li class="nav-item">-->
<!--                <router-link class="nav-link" v-bind:to="{name: 'Contact'}">Контакты</router-link>-->
<!--              </li>-->
<!--            </ul>-->
            <ul class="navbar-nav ml-auto mr-5">
              <li class="nav-item">
                <router-link class="nav-link" v-bind:to="{name: 'SingIn'}">Войти</router-link>
              </li>
            </ul>
<!--            <ul class="navbar-nav">-->
<!--              <li class="nav-item">-->
<!--                <CartWidget></CartWidget>-->
<!--              </li>-->
<!--              <li class="nav-item" v-if="user.isAuth()">-->
<!--                <router-link class="nav-link" v-bind:to="{name: 'Profile'}">{{ user.email }}</router-link>-->
<!--              </li>-->
<!--              <li class="nav-item" v-else>-->
<!--                <router-link class="nav-link" v-bind:to="{name: 'SignIn'}">Войти</router-link>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
      </nav>
    </header>

    <main class="content">
      <router-view/>
    </main>

    <footer class="container footer mt-5">
      <hr class="featurette-divider">
      <p class="float-right"><a href="#top">Back to top</a></p>
      <p>&copy; 2020 БГТУ Клесов ВТ-41</p>
<!--      <p>&copy; 2020 БГТУ Клесов ВТ-41 &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
    </footer>
  </div>
</template>
