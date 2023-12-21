<template>
  <div>
    <div>
      <label>Email</label>
      <input type="text" v-model="login.email" />
    </div>
    <div>
      <label>Password</label>
      <input type="password" v-model="login.password" />
    </div>
    <div>
      <button type="submit" @click="userLogin">Submit</button>
    </div>
  </div>
</template>

<script>
export default {
  auth: false,
  data() {
    return {
      login: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async userLogin() {
      try {
        const response = await this.$auth.loginWith('local', {
          data: this.login
        })

        this.$router.push({path: '/tracks'})

      } catch (err) {
        alert(err.message)
      }
    }
  }
}
</script>
