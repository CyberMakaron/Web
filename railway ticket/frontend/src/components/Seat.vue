<template>
  <tr>
    <td>Номер вагона: {{seat.wagonNumber}}
    <br>Место: {{seat.seatNumber}}
      <nobr v-if="seat.placement == 'bot'">(Нижнее)</nobr>
      <nobr v-else>(Верхнее)</nobr>
    <br>Класс:
      <nobr v-if="seat.class == 'coup'">Купе</nobr>
      <nobr v-else>Плацкарт</nobr>
    <td>Цена: {{seat.price}} ₽</td>
    <td>
            <button class="btn btn-danger btn-block btn-center" v-on:click="buyTicket()">Купить</button>
    </td>
  </tr>
</template>

<script>
import User from "@/components/User";

export default {
  name: "Seat",
  props: ["seat", "price"],
  data() {
    return {
    }
  },
  methods: {
    close () {
      this.$destroy();
      this.$el.parentNode.removeChild(this.$el);
    },
    buyTicket(){
      if (User.isAuth()){
        this.$confirm("Приобрести билет?", "", "question").then(() => {
              this.$http.post("/tickets/buy", {
                userId: User.id,
                seatId: this.seat.id
              }).then((response)=>this.close()).catch((errors)=>console.log(errors))
            })
        // window.location.reload()
      } else
        this.$alert("Для приобретения билетов нужно авторизоваться!", "", "warning")
    }
  }
}
</script>
