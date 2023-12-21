<template>
  <div>
    <ul>
      <li><button @click="logout">logout</button></li>
      <li><nuxt-link to="/tracks">tracks</nuxt-link></li>
      <li><nuxt-link to="/employees">employees</nuxt-link></li>
      <li><nuxt-link to="/vehicles">vehicles</nuxt-link></li>
    </ul>
    <nuxt></nuxt>
  </div>
</template>
<script>
export default {
  methods: {
    logout() {
      this.$auth.logout()

      this.$router.push({path: '/login'})
    }
  }
}
</script>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
