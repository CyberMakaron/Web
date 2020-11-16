<template>
  <tr>
    <td>{{rout.depart}}<br>{{rout.departTime}}</td>
    <td>{{rout.arrive}}<br>{{rout.arriveTime}}</td>
    <td>{{rout.train}}</td>
    <td>Плацкарт: {{rout.economyPrice}}<br>Свободно: {{rout.economyEmptySeats}}<br>Купе: {{rout.coupPrice}}<br>Свободно: {{rout.coupEmptySeats}}</td>
    <td>
      <button class="btn btn-danger btn-block btn-bot">Купить билеты</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "RoutingTableRow",
  props: ["rout"],
  methods: {

  }
}
</script>