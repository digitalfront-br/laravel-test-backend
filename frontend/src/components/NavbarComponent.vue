<template>
  <header id="navbar" class="uk-container uk-background-secondary uk-box-shadow-small" uk-sticky="animation: uk-animation-slide-top-medium;  top: 200; cls-active: uk-active uk-navbar-sticky uk-background-primary uk-box-shadow-small;">
    <nav class="uk-navbar " uk-navbar>

    <div class="uk-navbar-left">
      <div class="uk-navbar-item">
        <router-link to="/"><img src="../assets/logo.png" width="250" /></router-link>
      </div>
    </div>

    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav uk-light">
            <li>
              <router-link to="/imoveis">Imóveis</router-link>
            </li>
        </ul>

    </div>

</nav>
  </header>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
