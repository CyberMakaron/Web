<template>
  <div>
<!--    <h1>{{$route.query.depart}} - {{$route.query.arrive}} {{$route.query.date}}</h1>-->
    <h1>{{depart.name}} - {{arrive.name}} {{query.date}}</h1>
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
      items: [],
      depart: null,
      arrive: null
    }
  },
  created: function () {
    this.$http.get('/stations/station', {params: {id: this.query.departId}})
        .then((response) => { this.depart = response.data })
    this.$http.get('/stations/station', {params: {id: this.query.arriveId}})
        .then((response) => { this.arrive = response.data })

  }
}
</script>
