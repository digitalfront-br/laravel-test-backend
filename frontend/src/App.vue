<template>
  <div>
    <df-header />
    <router-view/>
  </div>
</template>

<script>
import DfHeader from "@/components/HeaderComponent"
export default {
  components: {
    DfHeader
  }
}
</script>