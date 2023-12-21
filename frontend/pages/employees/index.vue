<template>
  <div>
    <h1>Employee List</h1>
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
        <tr v-for="employee in data.employees">
          <td>{{ employee.id }}</td>
          <td>{{ employee.name }}</td>
          <td>{{ employee.surname }}</td>
          <td>{{ employee.gov_id }}</td>
          <td>{{ employee.birthdate }}</td>
          <td>{{ employee.gender }}</td>
          <td>{{ employee.email }}</td>
          <td>{{ employee.phone }}</td>
          <td>{{ employee.address }}</td>
          <td>{{ employee.department }}</td>
          <td>{{ employee.created_at }}</td>
          <td>{{ employee.updated_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  layout: 'base',
  name: 'EmployeeIndex',
  async asyncData({params, $axios}) {
    const employees = await $axios.$get('/employees')

    return employees
  }
}
</script>
