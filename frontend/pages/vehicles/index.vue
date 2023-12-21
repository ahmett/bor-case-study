<template>
  <div>
    <h1>Vehicle List</h1>
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
      <tr v-for="vehicle in data.vehicles">
        <td>{{ vehicle.id }}</td>
        <td>{{ vehicle.license_plate }}</td>
        <td>{{ vehicle.brand }}</td>
        <td>{{ vehicle.model }}</td>
        <td>{{ vehicle.year }}</td>
        <td>{{ vehicle.color }}</td>
        <td>{{ vehicle.engine }}</td>
        <td>{{ vehicle.fuel }}</td>
        <td>{{ vehicle.transmission }}</td>
        <td>{{ vehicle.created_at }}</td>
        <td>{{ vehicle.updated_at }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  layout: 'base',
  name: 'VehicleIndex',
  async asyncData({params, $axios}) {
    const vehicles = await $axios.$get('/vehicles')

    return vehicles
  }
}
</script>
