<template>
  <div class=" uk-background-muted header" uk-sticky=" animation: uk-animation-slide-top-small;  top: 200; cls-inactive: uk-section-small ; cls-active: uk-active uk-navbar-sticky uk-box-shadow-small; offset: 80;">
        <div class="uk-container uk-flex uk-flex-between">
          <h1 class="uk-h3 uk-text-bold uk-text-uppercase">{{ titulo }}</h1>
          <div>
            <router-link class="uk-link-reset" :to="link.url" > <span uk-tooltip="{ link.titulo }" uk-icon="icon: plus"></span></router-link>
          </div>
        </div>
      </div>
</template>
<script>
export default {
  props: ['titulo', 'link']
}
</script>