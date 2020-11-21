<template>
  <div class="bg_gray">
    <h1 class="text-center form-header"> ЖД билеты онлайн</h1>
    <form class="form-travel">
      <div class="form-row row-travel">
        <div class="col-md-3 mb-3">
          <label for="select-from">Откуда</label>
          <select class="form-control" id="select-from" v-model="depart">
            <option disabled value="">Выберите пункт отправления</option>
            <option v-for="option in depart_options" v-bind:value="option.value">
              {{ option.text }}
            </option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="select-to">Куда</label>
          <select class="form-control" id="select-to" placeholder="Не выбрано" v-model="arrive">
            <option disabled value="">Выберите пункт прибытия</option>
            <option v-for="option in arrive_options" v-bind:value="option.value">
              {{ option.text }}
            </option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="travelDate">Дата</label>
          <input class="form-control" type="date" id="travelDate" v-model="date">
        </div>
        <div class="col-md-3 mb-3">
          <router-link class="btn btn-danger btn-block btn-bot"
                       v-bind:to="{name: 'RoutsTable', params: {depart: depart, arrive : arrive, date: date}}">Найти билеты</router-link>
<!--          <button class="btn btn-danger btn-block btn-bot" v-on:click="btnClick">Найти билеты</button>-->
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  name: 'Home',
  components: {},
  data() {
    return {
      depart: "",
      arrive: "",
      date: "",
      depart_options: [],
      arrive_options: []
    }
  },
  created() {
    const instance = Axios.create({
      baseURL: 'http://localhost:8000/v1'
    });
    instance.get('/tickets/depart_points').then((response) => this.depart_options = response.data)
    instance.get('/tickets/arrive_points').then((response) => this.arrive_options = response.data)
  },
  methods: {
    btnClick(){
    }
  }
}
</script>
