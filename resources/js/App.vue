<template>
  <div>
    <h1>CRUD Laravel + Vue</h1>

    <button @click="addCrud">Add</button>

    <CrudComponent
      v-for="crud in cruds"
      :key="crud.id"
      :id="crud.id"
      :name="crud.title"
      :color="crud.color"
      @update="updateCrud"
      @delete="deleteCrud"
    />
  </div>
</template>

<script>
import CrudComponent from './components/CrudComponent.vue'

export default {
  components: {
    CrudComponent
  },

  data() {
    return {
      cruds: [
        {
          id: 1,
          title: 'Primer registro',
          color: 'red'
        }
      ]
    }
  },

  methods: {
    addCrud() {
      console.log('Add')
    },

    updateCrud(id, color) {
      console.log('Update', id, color)
    },

    deleteCrud(id) {
      console.log('Delete', id)
    }
  }
}
</script>