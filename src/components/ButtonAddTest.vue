<template>
    <button @click="toPage('addTest')">Добавить тест</button>
</template>

<script>
export default {
  name: 'HeaderApp',
  data(){
      return {
          
      }
  },
  props: {
      toPage: Function
  },
  methods: {
      
  }
}
</script>