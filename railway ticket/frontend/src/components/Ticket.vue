<template>
  <tr>
    <td>Номер вагона: {{ticket.seatwagon}}
      <br>Место: {{ticket.seatNumber}}
      <nobr v-if="ticket.seatPlacement === 'bot'">(Нижнее)</nobr>
      <nobr v-else>(Верхнее)</nobr>
      <br>Класс:
      <nobr v-if="ticket.seatClass === 'coup'">Купе</nobr>
      <nobr v-else>Плацкарт</nobr>
    </td>
    <td>Отправление: {{ticket.voyage.depart}} | {{ticket.voyage.departDateTime}}
      <br>Прибытие: {{ticket.voyage.arrive}} | {{ticket.voyage.arriveDateTime}}
    </td>
    <td>Пассажир: {{ticket.passenger}}
      <br><nobr v-if="ticket.phone!==''">Контактный телефон: {{ticket.phone}}</nobr>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Ticket",
  props: ["ticket"],
}
</script>