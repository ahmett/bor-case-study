<template>
  <div>
    <h1>Track Detail (#{{track.id}})</h1>
    <hr>
    <h2>Vehicle</h2>
    <table>
      <thead>
      <tr>
        <th>#ID</th>
        <th>license plate</th>
        <th>brand</th>
        <th>model</th>
        <th>year</th>
        <th>color</th>
        <th>engine</th>
        <th>fuel</th>
        <th>transmission</th>
        <th>created at</th>
        <th>updated at</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>{{ track.vehicle.id }}</td>
        <td>{{ track.vehicle.license_plate }}</td>
        <td>{{ track.vehicle.brand }}</td>
        <td>{{ track.vehicle.model }}</td>
        <td>{{ track.vehicle.year }}</td>
        <td>{{ track.vehicle.color }}</td>
        <td>{{ track.vehicle.engine }}</td>
        <td>{{ track.vehicle.fuel }}</td>
        <td>{{ track.vehicle.transmission }}</td>
        <td>{{ track.vehicle.created_at }}</td>
        <td>{{ track.vehicle.updated_at }}</td>
      </tr>
      </tbody>
    </table>
    <hr>
    <h2>Employee</h2>
    <table>
      <thead>
      <tr>
        <th>#ID</th>
        <th>name</th>
        <th>surname</th>
        <th>gov id</th>
        <th>birthdate</th>
        <th>gender</th>
        <th>email</th>
        <th>phone</th>
        <th>address</th>
        <th>department</th>
        <th>created at</th>
        <th>updated at</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>{{ track.employee.id }}</td>
        <td>{{ track.employee.name }}</td>
        <td>{{ track.employee.surname }}</td>
        <td>{{ track.employee.gov_id }}</td>
        <td>{{ track.employee.birthdate }}</td>
        <td>{{ track.employee.gender }}</td>
        <td>{{ track.employee.email }}</td>
        <td>{{ track.employee.phone }}</td>
        <td>{{ track.employee.address }}</td>
        <td>{{ track.employee.department }}</td>
        <td>{{ track.employee.created_at }}</td>
        <td>{{ track.employee.updated_at }}</td>
      </tr>
      </tbody>
    </table>
    <hr>
    <h2>Update Track</h2>

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
    <button @click="updateTrack(track.id)">update</button>
  </div>
</template>

<script>
export default {
  layout: "base",
  name: "tracks-id",
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
    const track = await $axios.$get(`/tracks/${params.id}`)

    return {
      vehicles: vehicles.data.vehicles,
      employees: employees.data.employees,
      track: track.data.track
    }
  },
  mounted() {
    this.payload.vehicle_id = this.track.vehicle_id
    this.payload.employee_id = this.track.employee_id
  },
  methods: {
    async updateTrack(id) {
      const yes = confirm('are you sure?');

      if (!yes) return;

      try {
        await this.$axios.$patch(`/tracks/${id}`, this.payload)
        await this.$nuxt.refresh()
      } catch (e) {
        alert(e.message)
      }
    }
  }
}
</script>
