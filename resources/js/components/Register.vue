<template>
<div class="container">
    <ValidationObserver v-slot="{ invalid }">
      <form>
        <div class="mb-3 mt-3">
          <label for="Name" class="form-label">ユーザー名</label>
          <ValidationProvider rules="required" name="ユーザー名" v-slot="{ errors }">
            <input
              v-model="form.name"
              type="text"
              class="form-control form-control-sm"
              aria-describedby="nameHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="nameHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail" class="form-label">メールアドレス</label>
          <ValidationProvider rules="required" name="メールアドレス" v-slot="{ errors }">
            <input
              v-model="form.email"
              type="email"
              class="form-control form-control-sm"
              aria-describedby="emailHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="emailHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword" class="form-label">パスワード</label>
          <ValidationProvider rules="required" name="パスワード" v-slot="{ errors }">
            <input
              v-model="form.password"
              type="password"
              class="form-control form-control-sm"
              aria-describedby="passwordHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="passwordHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword" class="form-label">パスワード</label>
          <ValidationProvider rules="required" name="パスワード" v-slot="{ errors }">
            <input
              v-model="form.password_confirmation"
              type="password"
              class="form-control form-control-sm"
              aria-describedby="passwordHelp"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
          <div id="passwordHelp" class="form-text"></div>
        </div>

        <div class="row">
          <button type="button" :disabled="invalid" class="btn btn-success col-6 mx-auto" @click="register">
            登録
          </button>
        </div>
      </form>
    </ValidationObserver>
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
  name: "Register",
  data: () => ({
    form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    },
    errors: [],
  }),
  methods: {
    register() {
      axios.post("/api/register", this.form)
        .then((response) => {
            this.$router.push({ name: "Login" });
        })
        .catch((error) => {
            console.log('登録失敗');
            this.errors = error.response.data.errors;
        });
    },
  },
};

</script>

<style>
</style>
