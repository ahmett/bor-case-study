<template>
  <div>
    <h1>Track List <nuxt-link to="/tracks/add">(add)</nuxt-link></h1>
    <table>
      <thead>
      <tr>
        <th>#ID</th>
        <th>vehicle</th>
        <th>employee</th>
        <th>created at</th>
        <th>updated at</th>
        <th>actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="track in data.tracks">
        <td>{{ track.id }}</td>
        <td>{{ track.vehicle.brand }} - {{ track.vehicle.model }} ({{ track.vehicle.year }}) - {{ track.vehicle.license_plate }}</td>
        <td>{{ track.employee.name }} {{ track.employee.surname }} - {{ track.employee.gov_id }}</td>
        <td>{{ track.created_at }}</td>
        <td>{{ track.updated_at }}</td>
        <td>
          <button @click="detail(track.id)">detail</button>
          <button @click="deleteTrack(track.id)">delete</button>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  layout: 'base',
  name: 'TrackIndex',
  async asyncData({params, $axios}) {
    const tracks = await $axios.$get('/tracks')

    return tracks
  },
  methods: {
    detail(id) {
      this.$router.push({ path: `/tracks/${id}` })
    },
    async deleteTrack(id) {
      const yes = confirm('are you sure?');

      if (!yes) return;

      try {
        await this.$axios.$delete(`/tracks/${id}`)
        await this.$nuxt.refresh()
      } catch (err) {
        alert(err.message)
      }
    }
  }
}
</script>
