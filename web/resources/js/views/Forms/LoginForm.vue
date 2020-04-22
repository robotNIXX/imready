<template>
  <md-dialog :md-active.sync="showLogin" class="modal-login">
      <md-dialog-title>
          Авторизация
      </md-dialog-title>
      <md-dialog-content>
          <form novalidate class="md-layout" @submit.prevent="login" method="post">
              <div class="md-layout">
                  <md-field :class="messageClass">
                      <md-input v-model="userLogin.email" name="email" type="email" placeholder="Адрес электронной почты"></md-input>
                      <span class="md-error" v-if="has_error && errors.email" v-for="error in errors.email">{{ error }}</span>
                  </md-field>
                  <md-field :class="messageClass">
                      <md-input v-model="userLogin.password" name="password" type="password" placeholder="Пароль"></md-input>
                      <span class="md-error" v-if="has_error && errors.password" v-for="error in errors.password">{{ error }}</span>
                      <span class="md-helper-text"><a href="">Забыли пароль?</a></span>
                  </md-field>
                  <div class="md-layout md-alignment-top-right">
                      <md-button type="submit" class="md-primary" :disabled="sending">Авторизоваться</md-button>
                  </div>
              </div>
          </form>
          <div class="md-layout md-alignment-top-center">
              Нет профиля? Вы можете зарегистрироваться&nbsp;<a href="#" @click="showSignupForm()"> здесь</a>.
          </div>
      </md-dialog-content>
  </md-dialog>
</template>

<script>

  export default {
    name: "LoginForm",
    props: {
      showLogin: {
        default: false,
        type: Boolean
      },
      userLogin: {
        type: Object,
        default: function () {
          return {};
        }
      }
    },
    data: () => ({
        showLoginLocal: this.showLogin,
        sending: false,
        has_error: false,
        error: '',
        errors: {},
        success: false,
        hasMessages: false
    }),
    computed: {
        messageClass() {
            return {
                'md-invalid': this.hasMessages
            }
        }
    },
    methods: {
        login: function() {
            let app = this;
            this.$auth.login({
                data: this.userLogin,
                success: function(res) {
                    app.showLogin = false;
                    app.$auth.user(res.data);
                },
                error: function(res) {
                    app.hasMessages = true
                    app.has_error = true
                    app.error = res.response.data.error
                    app.errors = res.response.data.errors || {}
                },
                redirect: '/dashboard'
            })
        }
    }
  }

</script>
