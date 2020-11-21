<template>
  <div>
    <h1>{{$route.params.depart}} - {{$route.params.arrive}} {{$route.params.date}}</h1>
  <table class="table table-striped my-5">
    <thead>
    <tr>
      <th scope="col">Отправление</th>
      <th scope="col">Прибытие</th>
      <th scope="col">Рейс</th>
      <th scope="col">Цены</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody v-for="item in items">
    <RoutingTableRow v-bind:rout="item"></RoutingTableRow>
    </tbody>
  </table>
  </div>
</template>
<!--TODO сделать что-то с обновлением страницы
  как вариант добавить на странице home данные в localStorage, здесь их извлекать. Пример в User.js-->
<script>
import RoutingTableRow from "@/components/RoutingTableRow";
import Axios from "axios";
export default {
  name: "RoutingTable",
  components: {RoutingTableRow},
  data() {
    return {
      items: []
    }
  },
  created() {
    const instance = Axios.create({
      baseURL: 'http://localhost:8000/v1'
    });
    //TODO побороть CORS и сделать POST запрос
    instance.get('/tickets/trains').then((response) => this.items = response.data)
  }
}
</script>
