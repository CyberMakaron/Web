<template>
  <div>
    <h1>Белгород - Старый Оскол 01.01.2020</h1>
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
export default {
  name: "RoutingTable",
  components: {RoutingTableRow},
  data() {
    return {
      items: [
        {
          depart: "Белгород",
          departTime: "8:00",
          arrive: "Старый Оскол",
          arriveTime: "10:45",
          train: "Белгород - Старый Оскол №001",
          economyPrice: "50 руб",
          economyEmptySeats: "30",
          coupPrice: "1000 руб",
          coupEmptySeats: "15"
        },
        {
          depart: "Белгород",
          departTime: "11:00",
          arrive: "Старый Оскол",
          arriveTime: "13:45",
          train: "Белгород - Старый Оскол №002",
          economyPrice: "50 руб",
          economyEmptySeats: "30",
          coupPrice: "1000 руб",
          coupEmptySeats: "15"
        },
        {
          depart: "Белгород",
          departTime: "18:00",
          arrive: "Старый Оскол",
          arriveTime: "20:45",
          train: "Белгород - Старый Оскол №003",
          economyPrice: "50 руб",
          economyEmptySeats: "30",
          coupPrice: "1000 руб",
          coupEmptySeats: "15"
        }
      ]
    }
  }
}
</script>
