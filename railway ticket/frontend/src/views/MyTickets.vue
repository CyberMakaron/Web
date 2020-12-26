<template>
  <div class="mx-auto mt-5" style="width: 70%">
    <h1 v-if="tickets.length===0" class="text-center">Пока что вы не приобрели ни одного билета</h1>
    <h1 v-else class="text-center">Приобретённые билеты</h1>
    <table class="table table-striped my-5">
      <tbody v-for="ticket in tickets" >
      <Ticket v-bind:ticket="ticket"></Ticket>
      </tbody>
    </table>
  </div>
</template>

<script>
import Ticket from "@/components/Ticket";
import User from "@/components/User";
export default {
  name: "MyTickets",
  components: {Ticket},
  data() {
    return {
      voyage: null,
      tickets: []
    }
  },
  created: function () {
    this.$http.get('/tickets/user_tickets', {params: { userId: User.id}})
        .then((response) => { this.tickets = response.data })
  }
}
</script>
