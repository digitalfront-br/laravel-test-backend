<template>
    <div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
      <div class="uk-card uk-card-default uk-card-body">
          <div v-if="msg !== ''" class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ msg }}</p>
</div>
        <legend class="uk-legend">Login</legend>
        <div class="uk-margin">
            <input class="uk-input" type="text" v-model="user.email" placeholder="email" />
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="password" v-model="user.password" placeholder="senha" />
        </div>
        <div class="uk-margin">
            <button :disabled="user.email.length <= 3 || user.password.length < 6" class="uk-button uk-button-primary uk-width-1-1" @click="login()">Entrar</button>
        </div>
      </div>
    </div>
</template>

<script>
import API from "@/services/API.js"
export default {
    data(){
        return {
            msg: '',
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods:{
        login(){
            API.post('auth/login', this.user)
                .then(res => {
                    console.log(res)
                    localStorage.setItem('user', res.data.access_token)
                    })
                .catch((error) => {
                    if(error == "Error: Request failed with status code 401"){
                        this.msg = "Usuario não cadastrado"
                    }
                })
        }
    }
}
</script>