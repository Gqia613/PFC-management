<template>
<div>
  <nav class="navbar navbar-light bg-success shadow-sm">
      <div class="container-fluid">
          <router-link :to="{ name: 'Home'}" class="navbar-brand mr-4">
              <span class="navbar-brand mb-0 h1 text-white">PFC-manage</span>
          </router-link>
          <div class="d-flex flex-row-reverse"> 
              <router-link :to="{ name: 'Register'}" class="navbar-brand m-1">
                  <button type="button" class="btn btn-light btn-sm ml-1 mr-1 text-success">
                      新規登録
                  </button>
              </router-link>
          </div>
      </div>
  </nav>
  <div class="container">
      <div class="alert alert-danger mt-3" role="alert" v-if="errors != ''">
        {{ errors }}
      </div>

      <ValidationObserver v-slot="{ invalid }">
        <form>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label">ユーザー名</label>
            <ValidationProvider rules="required" name="ユーザー名" v-slot="{ errors }">
              <input
                v-model="form.name"
                type="text"
                class="form-control form-control-sm"
                aria-describedby="nameHelp"
                id="name"
              />
              <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <div id="nameHelp" class="form-text"></div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <ValidationProvider rules="required" name="パスワード" v-slot="{ errors }">
              <input
                v-model="form.password"
                type="password"
                class="form-control form-control-sm"
                aria-describedby="passwordHelp"
                id="password"
              />
              <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <div id="passwordHelp" class="form-text"></div>
          </div>

          <div class="row">
            <button type="button" :disabled="invalid" class="btn btn-warning col-6 mx-auto" @click="login">
              ログイン
            </button>
          </div>
        </form>
      </ValidationObserver>
  </div>
</div>
</template>

<script>
import Vue from 'vue';
import { required, numeric, min_value } from 'vee-validate/dist/rules';
import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';

// Add a rule.
extend('required', {
  ...required,
  message: '{_field_}は必須です'
});

extend('numeric', {
  ...numeric,
  message: '{_field_}は数値を入力してください'
});

extend('min_value', {
  ...min_value,
  message: '{_field_}は0以上の数値を入力してください'
});

extend('selectCheck', value => {
  if (value !== "0") {
    return true;
  }
  return '{_field_}を選択してください';
});

Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);
export default {
    name: "Login",
    data: () => ({
        form: {
            name: "",
            password: "",
            remember: false,
        },
        errors: "",
    }),
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie')
            .then(response => {
                axios.post("/api/login", this.form)
                .then((response) => {
                this.$router.push({ name: "Home" });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors.errormsg[0];
                });
            });
        },
    },
};

</script>

<style>
</style>
