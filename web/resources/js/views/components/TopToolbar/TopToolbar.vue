<template>
    <md-toolbar>
        <div class="md-layout-item md-size-75">
            <h3 class="md-title">I'm ready</h3>
        </div>
        <div class="auth-block md-layout-item md-size-25" v-if="!$auth.check()" @click="showLoginForm()">
            <md-icon>person</md-icon>
        </div>
        <md-dialog :md-active.sync="showLogin" class="modal-login">
            <md-dialog-title>
                Авторизация
            </md-dialog-title>
            <md-dialog-content>
                <form novalidate class="md-layout" @submit.prevent="login" method="post">
                    <div class="md-layout">
                        <md-field>
                            <md-input v-model="userLogin.email" name="email" type="email"
                                      placeholder="Адрес электронной почты"></md-input>
                        </md-field>
                        <md-field>
                            <md-input v-model="userLogin.password" name="password" type="password"
                                      placeholder="Пароль"></md-input>
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
                        <md-field>
                            <md-input v-model="userRegister.email" name="email" type="email"
                                      placeholder="Адрес электронной почты"></md-input>
                        </md-field>
                        <md-field>
                            <md-input v-model="userRegister.password" name="password" type="password"
                                      placeholder="Пароль"></md-input>
                        </md-field>
                        <md-field>
                            <md-input v-model="userRegister.confirm_password" name="password" type="password"
                                      placeholder="Подтвердите пароль"></md-input>
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
            userRegister: {}
        }),
        methods: {
            showLoginForm: function() {
                this.showLogin = true;
                this.showSignup = false;
            },
            showSignupForm: function() {
                this.showLogin = false;
                this.showSignup = true;
            },
            login: function() {
                let app = this;
                this.$auth.login({
                    params: this.userLogin,
                    success: function() {

                    }
                })
            },
            register: function() {
                let app = this;
                this.$auth.register({
                    params: this.userRegister,
                    success: function() {

                    }
                })
            }
        }
    }
</script>
