<template>
  <div>
    <df-navbar />
    <router-view/>
  </div>
</template>

<script>
import DfNavbar from "@/components/NavbarComponent"
export default {
  data(){
    return {
      authData: false
    }
  },
  mounted(){
    this.login
  },
  components: {
    DfNavbar
  }
}
</script>