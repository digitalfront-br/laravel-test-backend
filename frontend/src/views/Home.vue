<template>
  <div class="home">
    Home
  </div>
</template>

<script>
import API from '@/services/API.js'

export default {
  name: 'Home',
  data(){
    return {
      dados: []
    }
  },
  mounted(){
    // API.get('imovel',{})
    API.post('auth/login', {
      "email": "email@site.com",
      "password": "password"
    })
      .then(res => console.log(res))
      .catch(res => console.log(res))
  }
}
</script>
