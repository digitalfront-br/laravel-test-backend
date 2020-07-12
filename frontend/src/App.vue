<template>
  <div>
    <df-navbar v-if="authData" />
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
  components: {
    DfNavbar
  }
}
</script>