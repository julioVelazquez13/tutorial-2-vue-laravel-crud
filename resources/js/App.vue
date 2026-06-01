<template>
  <div>
    <h1>CRUD Laravel + Vue</h1>

    <button @click="addCrud">Add</button>

    <CrudComponent
      v-for="crud in cruds"
      :key="crud.id"
      :id="crud.id"
      :name="crud.name"
      :color="crud.color"
      @update="updateCrud"
      @delete="deleteCrud"
    />
  </div>
</template>

<script>
import axios from 'axios'
import CrudComponent from './components/CrudComponent.vue'

export default {
  components: {
    CrudComponent
  },

  data() {
    return {
      cruds: []
    }
  },

  mounted() {
    this.getCruds()
  },

  methods: {
    async getCruds() {
      const response = await axios.get('/cruds')
      this.cruds = response.data
    },

    async addCrud() {
      const response = await axios.get('/cruds/create')
      this.cruds.push(response.data)
    },

    async updateCrud(id, color) {
      await axios.put(`/cruds/${id}`, {
        color: color
      })

      const crud = this.cruds.find(item => item.id === id)
      if (crud) {
        crud.color = color
      }
    },

    async deleteCrud(id) {
      await axios.delete(`/cruds/${id}`)
      this.cruds = this.cruds.filter(item => item.id !== id)
    }
  }
}
</script>