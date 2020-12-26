<template>
  <div class="mx-auto" style="width: 70%">
    <h1 class="text-center">Свободные места на рейс {{voyage.name}}</h1>
    <table class="table table-striped my-5">
      <nobr v-on="getPrices()"></nobr>
      <tbody v-for="seat in seats" >
        <Seat v-bind:seat="seat"></Seat>
      </tbody>
    </table>
  </div>
</template>

<script>
import Seat from "@/components/Seat";
export default {
  name: "BuyTickets",
  components: {Seat},
  data() {
    return {
      voyageId: this.$route.query.voyageId,
      voyage: null,
      seats: []
    }
  },
  created: function () {
    this.$http.get('/voyages/voyage_from_id', {params: { id: this.voyageId}})
         .then((response) => { this.voyage = response.data })
    this.$http.get('/seats/voyage_empty_seats', {params: { voyageId: this.voyageId}})
        .then((response) => this.seats = response.data)
  },
  methods :{
    getPrices(){
      for (let i = 0; i < this.seats.length; i++){
        if (this.seats[i].class === 'coup' && this.seats[i].placement === 'top')
          this.seats[i]['price'] = this.voyage.coupPriceTop
        if (this.seats[i].class === 'coup' && this.seats[i].placement === 'bot')
          this.seats[i]['price'] = this.voyage.coupPriceBot
        if (this.seats[i].class === 'economy' && this.seats[i].placement === 'top')
          this.seats[i]['price'] = this.voyage.economyPriceTop
        if (this.seats[i].class === 'economy' && this.seats[i].placement === 'bot')
          this.seats[i]['price'] = this.voyage.economyPriceBot
      }
    }
  }
}
</script>