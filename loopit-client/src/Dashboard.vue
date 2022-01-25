<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Cars in Stock
          </div>
          <div class="card-body">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Model</th>
                <th scope="col">Make</th>
                <th scope="col">Stock Quantity</th>
              </tr>
            </thead>
            <tbody>
              
              <tr v-for="car,index in cars" :key="car.id">
                <th scope="row">{{index}}</th>
                <td>{{car.make}}</td>
                <td>{{car.model}}</td>
                <td>{{car.stock}}</td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Actions from "./api/Actions"
export default {
  name: 'App',
  data(){
      return{
          cars:[]
      }
  },
  components: {
  },
  created(){
      Actions.cars()
      .then(response=>{
          this.cars=response.data;
      })
  }
}
</script>
