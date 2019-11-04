<template>
  <form id="register-form" @submit.prevent="submitForm">
    <slot></slot>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">Логин (E-mail)</label>

      <div class="col-md-6">
        <input
          id="email"
          type="email"
          class="form-control"
          name="email"
          autocomplete="email"
          placeholder="Введите вашу почту"
          v-model="form.email"
          :class="{
           'is-invalid': $v.form.email.$invalid && $v.form.email.$dirty,
           'is-valid': !$v.form.email.$invalid && $v.form.email.$dirty
          }"
          @blur="$v.form.email.$touch()"
        >
        <div class="invalid-feedback"
          v-if="!$v.form.email.required && $v.form.email.$dirty"
        >Поле обязательное</div>
        <div class="invalid-feedback"
          v-if="!$v.form.email.email && $v.form.email.$dirty"
        >Невалидный email адрес</div>
        <div class="invalid-feedback"
             v-if="!$v.form.email.isUnique && $v.form.email.$dirty"
        >{{ isUnique }}</div>
      </div>

    </div>
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Имя, фамилия</label>

      <div class="col-md-6">
        <input
          id="name"
          type="text"
          class="form-control"
          name="name"
          placeholder="Введите имя и фамилию"
          v-model="form.name"
          :class="{
           'is-invalid': $v.form.name.$invalid && $v.form.name.$dirty,
           'is-valid': !$v.form.name.$invalid && $v.form.name.$dirty
          }"
          @blur="$v.form.name.$touch()"
        >
        <div
          class="invalid-feedback"
          v-if="!$v.form.name.required && $v.form.name.$dirty"
        >Поле обязательное</div>
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>
      <div class="col-md-6">
        <input
          id="phone"
          type="text"
          class="form-control"
          name="phone"
          v-mask="'+7 (XXX) XXX-XX-XX'"
          placeholder="Введите ваш номер телефона"
          v-model="form.phone"
          :class="{
           'is-invalid': $v.form.phone.$invalid && $v.form.phone.$dirty,
           'is-valid': !$v.form.phone.$invalid && $v.form.phone.$dirty
          }"
          @blur="$v.form.phone.$touch()"
        >
        <div
          class="invalid-feedback"
          v-if="!$v.form.phone.required && $v.form.phone.$dirty"
        >Поле обязательное</div>
      </div>
    </div>
    <city-choose
      :valid="{
           'is-invalid': $v.form.region.$invalid && $v.form.region.$dirty,
           'is-valid': !$v.form.region.$invalid && $v.form.region.$dirty
          }"
      @value="updateRegion"
      @blur="$v.form.region.$touch()"
    ></city-choose>
    <div class="row mb-3">
      <div class="col-12 col-md-4"></div>
      <div class="invalid-feedback col-12 col-md-8"
        v-if="!$v.form.region.required && $v.form.region.$dirty"
      >Поле обязательное</div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

      <div class="col-md-6">
        <input
          id="password"
          type="password"
          class="form-control"
          name="password"
          autocomplete="password"
          placeholder="Введите пароль"
          v-model="form.password"
          :class="{
           'is-invalid': $v.form.password.$invalid && $v.form.password.$dirty,
           'is-valid': !$v.form.password.$invalid && $v.form.password.$dirty
          }"
          @blur="$v.form.password.$touch()"
        >
        <div
          class="invalid-feedback"
          v-if="!$v.form.password.required && $v.form.password.$dirty"
        >Поле обязательное</div>
        <div
          class="invalid-feedback"
          v-if="!$v.form.password.minLength && $v.form.password.$dirty"
        >Пароль должен содержать минимум {{ $v.form.password.$params.minLength.min }} символов</div>
      </div>
    </div>
    <div class="form-group row">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

      <div class="col-md-6">
        <input
          id="password-confirm"
          type="password"
          class="form-control"
          name="password_confirmation"
          autocomplete="password"
          placeholder="Повторите пароль"
          v-model="form.passwordConfirm"
          :class="{
          'is-invalid': $v.form.passwordConfirm.$invalid && $v.form.passwordConfirm.$dirty,
           'is-valid': !$v.form.passwordConfirm.$invalid && $v.form.passwordConfirm.$dirty
          }"
          @blur="$v.form.passwordConfirm.$touch()"
        >
        <div
          class="invalid-feedback"
          v-if="!$v.form.passwordConfirm.required && $v.form.passwordConfirm.$dirty"
        >Поле обязательное</div>
        <div
          class="invalid-feedback"
          v-if="!$v.form.passwordConfirm.sameAsPassword && $v.form.passwordConfirm.$dirty"
        >Пароли не совпадают</div>

      </div>
    </div>
    <div class="form-group row">
      <label for="partner" class="col-md-4 col-form-label text-md-right">Куратор</label>
      <div class="col-md-6">
        <input
          id="partner"
          type="text"
          class="form-control"
          name="partner"
          v-model="form.partner"
          placeholder="Введите имя вашего куратора"
          :class="{
           'is-invalid': $v.form.partner.$invalid && $v.form.partner.$dirty,
           'is-valid': !$v.form.partner.$invalid && $v.form.partner.$dirty
          }"
          @blur="$v.form.partner.$touch()"
        >
        <div
          class="invalid-feedback"
          v-if="!$v.form.partner.required && $v.form.partner.$dirty"
        >Поле обязательное</div>
      </div>
    </div>

    <div class="form-group row" style="display: none;">
      <label for="registration_referral_link" class="col-md-4 col-form-label text-md-right">Код реферера</label>
      <div class="col-md-6">
        <input
          id="registration_referral_link"
          type="text"
          class="form-control"
          name="registration_referral_link"
          v-model="form.code"
          placeholder="Введите код куратор"

        >
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center pt-4 pb-3">
      <button type="submit" class="btn btn-primary" :disabled="$v.$invalid">
        Отправить
      </button>
    </div>

  </form>

</template>

<script>
import axios from  'axios'
import toastr from 'toastr'
import { required, email, maxLength, minLength, sameAs} from 'vuelidate/lib/validators'
export default {
  name: 'RegisterForm',
  props: {
    action: {
      type: String,
      default: '',
      required: true
    },
    method: {
      type: String,
      default: 'post'
    },
    checkEmailAction: {
      type: String,
      default: '',
      required: true
    },
    code: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      isUnique: '',
      form: {
        email: '',
        name: '',
        phone: '',
        region: '',
        password: '',
        passwordConfirm: '',
        partner: '',
        code: ''
      }
    }
  },
  methods: {
    async submitForm() {
      if(this.$v.$invalid) {
        toastr.error('В форме содержаться ошибки');
      } else {
        try {
          const res = await axios.post(this.action, this.form);
          if(res.status === 200) {
            toastr.success(`${this.form.name} вы успешно зарегистрировались`);
          } else {
            toastr.error('Что-то пошло не так');
          }
          this.$v.$reset()
          window.location.href = '/dashboard'
        } catch (e) {
          console.log(e)
        }
      }

    },
    updateRegion(value) {
      this.form.region = value
    }
  },
  validations: {
    form: {
      name: {
        required
      },
      email: {
        required,
        email,
        async isUnique(value) {
          if (value === '') return true
          this.isUnique = 'Выполняеться проверка...'
          const res = await axios.get(this.checkEmailAction, {
            params: {
              email: value
            }
          })
          if(res.data.message.type === 'error') {
            this.isUnique = res.data.message.body
            return false
          } else {
            this.isUnique = res.data.message.body
            return  true
          }
        }
      },
      phone: {
        required,
        maxLength: maxLength(24)
      },
      region: {
        required
      },
      password: {
        required,
        minLength: minLength(8)
      },
      passwordConfirm: {
        required,
        sameAsPassword: sameAs('password')
      },
      partner: {
        required
      }
    }

  },
  mounted() {
    this.form.code = this.code
  }

}
</script>
