<template>
  <div>
<!--    <h1>{{$route.query.depart}} - {{$route.query.arrive}} {{$route.query.date}}</h1>-->
    <h1>{{query.depart}} - {{query.arrive}} {{query.date}}</h1>-
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

<script>
import RoutingTableRow from "@/components/RoutingTableRow";
import Axios from "axios";
import User from "@/components/User";
export default {
  name: "RoutingTable",
  components: {RoutingTableRow},
  data() {
    return {
      query: this.$route.query,
      items: []
    }
  },
  created() {
    const instance = Axios.create({
      baseURL: 'http://localhost:1149/v1'
    });
    instance.post('/tickets/trains', {
      depart: this.query.depart,
      arrive: this.query.arrive,
      date: this.query.date
    }).then((response) => { this.items = response.data })
    //.catch((errors) => {/*TODO обработать ошибку*/})
  }
}
</script>
