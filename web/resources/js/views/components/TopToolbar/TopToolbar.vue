<template>
    <md-toolbar>
        <div class="md-layout-item md-size-75">
            <h3 class="md-title">I'm ready</h3>
        </div>
        <div class="auth-block md-layout-item md-size-25" v-if="!$auth.check()" @click="showLoginForm()">
            <md-icon>person</md-icon>
        </div>

        <div class="auth-block md-layout-item md-size-25" v-if="$auth.check()">
          <md-menu md-size="medium" md-align-trigger>
              <md-button md-menu-trigger>

                <md-icon>account_circle</md-icon>
                {{ $auth.user().name }}
                <md-icon>expand_more</md-icon>
              </md-button>

              <md-menu-content class="main-menu">
                  <md-menu-item>
                    <md-icon>home</md-icon>
                    <router-link to="/">
                      Список задач
                    </router-link>
                  </md-menu-item>
                  <md-menu-item>
                    <md-icon>face</md-icon>
                      <router-link to="/dashboard">
                         Личный кабинет
                      </router-link>
                  </md-menu-item>
                  <md-menu-item>
                    <md-icon>settings</md-icon>
                    <router-link to="/profile">
                      Профиль
                    </router-link>
                  </md-menu-item>
                  <md-menu-item class="logout-link"  @click="logout()">
                    <md-icon>exit_to_app</md-icon> Выйти
                  </md-menu-item>
              </md-menu-content>
          </md-menu>
        </div>
        <md-dialog :md-active.sync="showLogin" class="modal-login">
            <md-dialog-title>
                Авторизация
            </md-dialog-title>
            <md-dialog-content>
                <form novalidate class="md-layout" @submit.prevent="login" method="post">
                    <div class="md-layout">
                        <md-field :class="messageClass">
                            <md-input v-model="userLogin.email" name="email" type="email"
                                      placeholder="Адрес электронной почты"></md-input>
                            <span class="md-error" v-if="has_error && errors.email" v-for="error in errors.email">{{ error }}</span>
                        </md-field>
                        <md-field :class="messageClass">
                            <md-input v-model="userLogin.password" name="password" type="password"
                                      placeholder="Пароль"></md-input>
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

        <md-dialog :md-active.sync="showSignup" class="modal-signup">
            <md-dialog-title>
                Авторизация
            </md-dialog-title>
            <md-dialog-content>
                <form novalidate class="md-layout" @submit.prevent="register" method="post">
                    <div class="md-layout">
                        <md-field :class="messageClass">
                            <md-input v-model="userRegister.name" name="name"
                                      placeholder="Имя пользователя"></md-input>
                            <span class="md-error" v-if="has_error && errors.name" v-for="error in errors.name">{{ error }}</span>
                        </md-field>
                        <md-field :class="messageClass">
                            <md-input v-model="userRegister.email" name="email" type="email"
                                      placeholder="Адрес электронной почты"></md-input>
                            <span class="md-error" v-if="has_error && errors.email" v-for="error in errors.email">{{ error }}</span>
                        </md-field>
                        <md-field :class="messageClass">
                            <md-input v-model="userRegister.password" name="password" type="password"
                                      placeholder="Пароль" required></md-input>
                            <span class="md-error" v-if="has_error && errors.password" v-for="error in errors.password">{{ error }}</span>
                        </md-field>
                        <md-field :class="messageClass">
                            <md-input v-model="userRegister.password_confirmation" name="password" type="password"
                                      placeholder="Подтвердите пароль" required></md-input>

                        </md-field>
                        <div class="md-layout md-alignment-top-right">
                            <md-button type="submit" class="md-primary" :disabled="sending">Создать профиль</md-button>
                        </div>
                    </div>
                </form>
            </md-dialog-content>
        </md-dialog>
    </md-toolbar>
</template>

<script>

    export default {
        name: 'TopToolbar',
        data: () => ({
            showLogin: false,
            showSignup: false,
            sending: false,
            userLogin: {},
            userRegister: {},
            has_error: false,
            error: '',
            errors: {},
            success: false,
            hasMessages: false,
            user: {}
        }),
        computed: {
            messageClass() {
                return {
                    'md-invalid': this.hasMessages
                }
            }
        },
        created() {
            return {
                _user() {
                    console.log(this.$auth.user());
                    return this.$auth.user() || {};
                }
            }
        },
        methods: {
            logout: function () {
                this.$auth.logout({
                    makeRequest: true,
                    redirect: {name: 'home'},
                });
            },
            showLoginForm: function () {
                this.showLogin = true;
                this.showSignup = false;
            },
            showSignupForm: function () {
                this.showLogin = false;
                this.showSignup = true;
            },
            login: function () {
                let app = this;
                this.$auth.login({
                    data: this.userLogin,
                    success: function (res) {
                        app.showLogin = false;
                        app.$auth.user(res.data);
                    },
                    error: function (res) {
                        app.hasMessages = true
                        app.has_error = true
                        app.error = res.response.data.error
                        app.errors = res.response.data.errors || {}
                    },
                    redirect: '/dashboard'
                })
            },
            register: function () {
                let app = this;
                this.$auth.register({
                    data: this.userRegister,
                    redirect: false,
                    success: function () {
                        app.showLoginForm();
                    },
                    error: function (res) {
                        app.hasMessages = true
                        app.has_error = true
                        app.error = res.response.data.error
                        app.errors = res.response.data.errors || {}
                    }
                })
            }
        }
    }
</script>
