<template>
  <div class="referral-link">
    <div class="form-group">
      <label for="registration_referral_link">Реферальная ссылка регистрации</label>
      <div class="d-flex justify-content-between">
        <input
          type="text"
          id="registration_referral_link"
          name="registration_referral_link"
          v-model="code"
          readonly="readonly"
          class="form-control">
        <button
          type="button"
          @click.prevent="copy"
          class="btn btn-primary ml-3">Скопировать</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'ReferralLink',
    props: {
      code: {
        type: String,
        required: true
      },
      url: {
        type: String,
        default: 'https://sky-robots.net/referral'
      }
    },
   data() {
      return {}
   },
    methods: {
      copy() {
        navigator.clipboard.writeText(`${this.url}/${this.code}`)
        .then(() => {
          // Получилось!
        })
        .catch(err => {
          console.log('Something went wrong', err);
        });
      }
    }
  }
</script>

<style lang="scss">

</style>