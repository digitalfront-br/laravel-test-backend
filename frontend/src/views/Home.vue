<template>
    <fragment>
      <div  v-if="imoveis === null" class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

          <div uk-spinner></div>
      </div>
      <div v-else>

      <div class=" uk-background-muted header" uk-sticky=" animation: uk-animation-slide-top-small;  top: 200; cls-inactive: uk-section-small ; cls-active: uk-active uk-navbar-sticky uk-box-shadow-small; offset: 80;">
        <div class="uk-container">
          <h1 class="uk-h3 uk-text-bold uk-text-uppercase">Imóveis cadastrados</h1>
        </div>
      </div>
      <div class="uk-container">
    <table    class="uk-table uk-table-justify uk-table-divider">
      <thead>
        <tr>
          <th><a href="#" class="uk-link-reset uk-margin-left" @click="ordenador($event, 'email')">Email</a></th>
          <th><a href="#" class="uk-link-reset" @click="ordenador($event, 'rua')">Endereço</a></th>
          <th><a href="#" class="uk-link-reset" @click="ordenador($event, 'status')">Status</a></th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        
        <tr v-for="(item, index) in imoveis.data" :key="item.id">
          <td>
            <p class="uk-margin-left uk-text-small">{{ item.email }}</p>
          </td>
          <td>
            <p class="uk-margin-left uk-text-small">{{ item.rua }}, {{ item.numero }}, {{ item.cidade.nome }}, {{ item.cidade.estado.nome }}</p>
          </td>
          <td v-if="item.status === 0">
            <p class="uk-text-warning uk-text-small">
              Não Contratado
            </p>
          </td>
          <td v-else >
            <p class="uk-text-small">
              Contratado
            </p>
          </td>
          <td>
                <a class="uk-text-danger"  uk-tooltip="remover" uk-icon="icon: trash" :href="`#modal-${ item.id }`" uk-toggle></a>
                <div :id="`modal-${ item.id }`" class="uk-flex-center" uk-modal>
                  <div class="uk-alert-danger uk-position-center" uk-alert>
                      <h3>Atenção</h3>
                      <p>Essa ação não poderá ser desfeita</p>
                          <p class="uk-text-right">
                              <button class="uk-button uk-button-small uk-button-default uk-modal-close" type="button">Cancelar</button>
                              <button class="uk-button uk-button-small uk-button-danger uk-modal-close" @click="softDelete(index)" type="button">Remover</button>
                          </p>
                  </div>
                </div>
          </td>
        </tr>
      </tbody>
    </table> 
      <hr />
      </div>
    <div class="uk-width-1-1 uk-section-small uk-flex uk-flex-center">
      <df-pagination v-if="imoveis.last_page" :source="imoveis" @navigate="navigate" />
    </div>
      </div>
        </fragment>
</template>

<script>
import API from "@/services/API.js"; 
import DfPagination from "@/components/paginateComponent.vue";
import {Fragment} from "vue-fragment"
export default {
  data() {
    return {
      imoveis: null,
      paginacao: null,
      order: ''
    };
  },
  components: {
    Fragment,
    "df-pagination": DfPagination
  },
  methods:{
    navigate(page) {
      API.get(`imovel?page=${page}&orderBy=${this.order}`).then(res => {
        this.imoveis = res.data
      })
    },
    ordenador(ev, page) {
      ev.preventDefault()
      this.order = page
      this.navigate()
    },
    softDelete: function (index) {
      const item  = this.imoveis.data.splice(index, 1);
      return item
    }
  },
  mounted() {
    API.get("imovel").then(res => {
      this.imoveis = res.data
    });
    // API.post('auth/login', {
    //   "email": "email@site.com",
    //   "password": "password"
    // })
    //   .then(res => console.log(res))
    //   .catch(res => console.log(res))
  }
};
</script>
