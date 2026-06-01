<template>
  <div>
    <h3>Name: {{ name }}</h3>

    <select :value="color" @change="update">
      <option value="red">Red</option>
      <option value="green">Green</option>
    </select>

    <button @click="del">Delete</button>
  </div>
</template>

<script>
export default {
  props: ['id', 'name', 'color'],
  methods: {
    update(event) {
      this.$emit('update', this.id, event.target.value)
    },
    del() {
      this.$emit('delete', this.id)
    }
  }
}
</script>