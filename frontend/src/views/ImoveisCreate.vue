<template>
  <fragment>
    <div v-if="estados === null" class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
      <div uk-spinner></div>
    </div>
    <div v-else>
      <df-header :titulo="header.titulo" :link="header.link" />
      <div class="uk-container">
        <div v-show="status" class="uk-alert-danger" uk-alert>
            <p>Os campos e-mail, rua, bairro, cidade e estado. São obrigatórios</p>
        </div>
        <div v-show="criado" class="uk-alert-success" uk-alert>
          <a class="uk-alert-close" uk-close></a>
            <p>Imóvel cadastrado com sucesso</p>
        </div>
          <div class="uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m uk-padding uk-padding-remove-horizontal" uk-grid>
            <div>
              <div class="uk-margin">
                <input class="uk-input" type="email" v-model="imovel.email" placeholder="email" />
              </div>
            </div>
            <div>
              <div class="uk-margin">
                <input class="uk-input" type="text" v-model="imovel.rua" placeholder="rua" />
              </div>
            </div>
            <div>
              <div class="uk-margin">
                <input class="uk-input" type="number" v-model="imovel.numero" placeholder="numero" />
              </div>
            </div>
            <div>
              <div class="uk-margin">
                <input
                  class="uk-input"
                  type="text"
                  v-model="imovel.complemento"
                  placeholder="complemento"
                />
              </div>
            </div>
            <div>
              <div class="uk-margin">
                <input class="uk-input" type="text" v-model="imovel.bairro" placeholder="bairro" />
              </div>
            </div>
            <div class="uk-width-expand">
            <div class="uk-margin uk-flex">
              <select class="uk-select" v-model="imovel.estado" @change="loadCidades($event)">
                <option value disabled>Selecione um estado</option>
                <option
                  v-for="est in estados"
                  :key="est.id"
                  :selected="est.codigo_uf === imovel.estado ? true : false"
                  :value="est.id"
                >{{ est.nome }}</option>
              </select>
              <select v-show="imovel.estado !== ''" class="uk-select" v-model="imovel.cidade_id">
                <option value disabled>Selecione uma cidade</option>
                <option
                  v-for="cid in cidades"
                  :key="cid.id"
                  :selected="cid.codigo_uf === imovel.cidade_id ? true : false"
                  :value="cid.id"
                >{{ cid.nome }}</option>
              </select>
            </div>
            </div>
            <div>
              <div class="uk-margin">
                <button @click="criarImovel()" class="uk-button uk-button-primary uk-width-1-1">Salvar</button>
              </div>
            </div>
          </div>
        <hr />
      </div>
    </div>
  </fragment>
</template>

<script>
import API from "@/services/API.js";
import DfHeader from "@/components/HeaderComponent.vue";
import { Fragment } from "vue-fragment";
export default {
  data() {
    return {
      header: {
        titulo: "Novo IMÓVEl",
        link: {
          titulo: "Novo Imóvel",
          url: "/estados/criar"
        }
      },
      imovel: {
        email: "",
        rua: "",
        numero: "",
        complemento: "",
        bairro: "",
        estado: "",
        cidade_id: ""
      },
      status: false,
      criado: false,
      estados: null,
      cidades: null
    };
  },
  components: {
    Fragment,
    "df-header": DfHeader
  },
  methods: {
    loadEstados() {
      API.get("estados").then(res => {
        this.estados = res.data;
        console.log(res.data);
      });
    },
    loadCidades(ev) {
      API.get(`estados/${ev.target.value}`).then(res => {
        this.cidades = res.data.cidades;
        console.log(res.data);
      });
    },
    criarImovel(){
      this.status = false;
      if (this.imovel.email !== '' && this.imovel.rua !== '' && this.imovel.bairro !== '' && this.imovel.estado !== '' && this.imovel.cidade_id !== '' ) {
        console.log(this.imovel)
        let objeto = {
          email: this.imovel.email,
          rua: this.imovel.rua,
          cidade_id: this.imovel.cidade_id,
          bairro: this.imovel.bairro,
          complemento: this.imovel.complemento,
          numero: this.imovel.numero,
        }
        API.post("imovel", objeto , {headers:{ 'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5NDUyNzE2NywiZXhwIjoxNTk0NTMwNzY3LCJuYmYiOjE1OTQ1MjcxNjcsImp0aSI6Ikoyb1oyQ1pyempKRXd4ZUMiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.1Tcn19_MwEVin0BUao0JqLX3QJw4Eq2lNKRspr01Xmg' }})
          .then(res => console.log(res))
          .catch( error => { 
            console.log('error: ' + error); 
          });
      } else {
        this.status = true
      }
    }
  },
  mounted() {
    this.loadEstados();
  }
};
</script>
