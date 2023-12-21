<template>
  <div>
    <h1>Add Track</h1>
    <b>Vehicle: </b>
    <input list="vehicles" v-model="payload.vehicle_id">
    <datalist id="vehicles">
      <option v-for="vehicle in vehicles" :value="vehicle.id">
        {{ vehicle.brand }} - {{ vehicle.model }} ({{ vehicle.year }}) - {{ vehicle.license_plate }}
      </option>
    </datalist>
    <br>
    <b>Employee: </b>
    <input list="employees" v-model="payload.employee_id">
    <datalist id="employees">
      <option v-for="employee in employees" :value="employee.id">
        {{ employee.name }} {{ employee.surname }} - {{ employee.gov_id }}
      </option>
    </datalist>
    <br>
    <button @click="addTrack">add</button>
  </div>
</template>

<script>
export default {
  layout: "base",
  name: "track-add",
  data() {
    return {
      payload: {
        vehicle_id: null,
        employee_id: null
      }
    }
  },
  async asyncData({params, $axios}) {
    console.log(params.id);
    const vehicles = await $axios.$get('/vehicles')
    const employees = await $axios.$get('/employees')

    return {
      vehicles: vehicles.data.vehicles,
      employees: employees.data.employees,
    }
  },
  methods: {
    async addTrack() {
      const yes = confirm('are you sure?');

      if (!yes) return;

      try {
        await this.$axios.$post(`/tracks`, this.payload)

        await this.$router.push({ path: '/tracks' })
      } catch (e) {
        alert(e.message)
      }
    }
  }
}
</script>
