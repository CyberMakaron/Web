<template>
  <tr>
    <td>{{voyage.depart}}<br>{{voyage.departDateTime}}</td>
    <td>{{voyage.arrive}}<br>{{voyage.arriveDateTime}}</td>
    <td>{{voyage.name}}</td>
    <td>Плацкарт: {{voyage.economyPriceBot}}-{{voyage.economyPriceTop}} ₽<br>
      Свободно: {{voyage.economyEmptySeats}}<br>
      Купе: {{voyage.coupPriceBot}}-{{voyage.coupPriceTop}} ₽<br>
      Свободно: {{voyage.coupEmptySeats}}</td>
    <td>
      <router-link class="btn btn-danger btn-block btn-bot" v-bind:to="{name: 'BuyTickets', query: {voyageId: voyage.id}}">Купить билеты</router-link>
    </td>
  </tr>
</template>

<script>
export default {
  name: "RoutingTableRow",
  props: ["voyage"]
}
</script>