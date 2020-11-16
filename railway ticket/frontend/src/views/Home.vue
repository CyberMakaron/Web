<template>
  <div class="bg_gray">
    <h1 class="text-center form-header"> ЖД билеты онлайн</h1>
    <form class="form-travel">
      <div class="form-row row-travel">
        <div class="col-md-3 mb-3">
          <label for="select-from">Откуда</label>
          <select class="form-control" id="select-from" v-model="depart">
            <option class="slctBlg" value="Белгород">Белгород</option> <!-- можно добавить value, но переменная инициализируется и текстом-->
            <option class="slctMsc">Москва</option>
            <option class="slctStOskl">Старый оскол</option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="select-to">Куда</label>
          <select class="form-control" id="select-to" placeholder="Не выбрано" v-model="arrive">
            <option class="slctBlg">Белгород</option>
            <option class="slctMsc">Москва</option>
            <option class="slctStOskl">Старый оскол</option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="travelDate">Дата</label>
          <input class="form-control" type="date" id="travelDate" v-model="date">
        </div>
        <div class="col-md-3 mb-3">
<!--TODO сделать метод, в нём запрашивать из БД данные и вызывать таблицу или передать параметры запроса в таблицу и выполнить запрос там-->
          <router-link class="btn btn-danger btn-block btn-bot" v-bind:to="{name: 'RoutsTable'}">Найти билеты</router-link>
<!--          <button class="btn btn-danger btn-block btn-bot" v-on:click="btnClick">Найти билеты</button>-->
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Home',
  components: {},
  data() {
    return {
      depart: "",
      arrive: "",
      date: ""
    }
  },
  methods: {
    // btnClick(){
    //   alert(this.depart)
    // }
  }
}
</script>
