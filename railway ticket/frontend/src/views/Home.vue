<template>
  <div class="bg_gray">
    <h1 class="text-center form-header"> ЖД билеты онлайн</h1>
    <form class="form-travel">
      <div class="form-row row-travel">
        <div class="col-md-3 mb-3">
          <label for="select-from" v-bind:class="depart_status">Откуда</label>
          <select class="form-control" v-bind:class="depart_status" id="select-from" v-model="departId" v-on:change="fieldChanged(1)">
            <option disabled value="0">Выберите пункт отправления</option>
            <option v-for="option in depart_options" v-bind:value="option.id">
              {{ option.name }}
            </option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="select-to" v-bind:class="arrive_status">Куда</label>
          <select class="form-control" v-bind:class="arrive_status" id="select-to" v-model="arriveId" v-on:change="fieldChanged(2)">
            <option disabled value="0">Выберите пункт прибытия</option>
            <option v-for="option in arrive_options" v-bind:value="option.id" >
              {{ option.name }}
            </option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="travelDate" v-bind:class="date_status">Дата</label>
          <input class="form-control" v-bind:class="date_status" type="date" v-bind:min="minDate" id="travelDate"
                 v-model="date" v-on:change="fieldChanged(3)">
        </div>
        <div class="col-md-3 mb-3">
          <input type="button" v-on:click="btnClick()" class="btn btn-danger btn-block btn-bot" value="Найти билеты" >
<!--          <router-link class="btn btn-danger btn-block btn-bot"-->
<!--                       v-bind:to="{name: 'RoutsTable', query: {depart: depart, arrive : arrive, date: date}}">Найти билеты</router-link>-->
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  name: 'Home',
  components: {},
  data() {
    return {
      departId: "0",
      arriveId: "0",
      date: "",
      depart_options: [],
      arrive_options: [],
      minDate: "",
      maxDate: "",
      depart_status: "",
      arrive_status: "",
      date_status: ""
    }
  },
  created() {
    this.minDate = new Date().toISOString().split("T")[0];
    this.$http.get('/stations/all_departs').then((response) => this.depart_options = response.data)
    this.$http.get('/stations/all_arrives').then((response) => this.arrive_options = response.data)
  },
  methods: {
    btnClick(){
      if (this.departId == "0")
        this.depart_status = "border-danger text-danger";
      else
        this.depart_status = "";
      if (this.arriveId == "0")
        this.arrive_status = "border-danger text-danger";
      else
        this.arrive_status = "";
      if (this.date == "")
        this.date_status = "border-danger text-danger";
      else
        this.date_status = "";
      if(this.depart_status == "" && this.arrive_status == "" && this.date_status =="")
        this.$router.push({name: 'RoutsTable', query: {departId: this.departId, arriveId : this.arriveId, date: this.date}});
    },
    fieldChanged(field){
      switch (field){
        case 1: this.depart_status = "";
        break;
        case 2: this.arrive_status = "";
        break;
        case 3: this.date_status = "";
      }
    }
  }
}
</script>
