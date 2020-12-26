<template>
  <div>
    <h1>Рейс {{depart.name}} - {{arrive.name}} {{query.date}}</h1>
  <table class="table table-striped my-5">
    <thead>
    <tr>
      <th scope="col">Отправление</th>
      <th scope="col">Прибытие</th>
      <th scope="col">Рейс</th>
      <th scope="col">Места</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody v-for="item in items">
      <RoutingTableRow v-bind:voyage="item"></RoutingTableRow>
    </tbody>
  </table>
  </div>
</template>

<script>
import RoutingTableRow from "@/components/RoutingTableRow";
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
    this.$http.get('/voyages/voyages',
        {params: {  departId: this.query.departId,
                          arriveId: this.query.arriveId,
                          depart_date: this.query.date}})
        .then((response) => { this.items = response.data })
  }
}
</script>
