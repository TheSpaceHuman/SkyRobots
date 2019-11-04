<template>
    <div class="preloader-wrapper" v-loading="loading">
      <slot></slot>
    </div>
</template>

<script>
  export default {
    name: 'ThePreloader',
    data() {
      return {
        loading: true
      }
    },
    methods: {
      hangEvent() {
        window.onload = (e) => {
          this.loading = false
        }
        /*document.addEventListener('DOMContentLoaded', (e) => {
          console.log(e)
          this.loading = false
        })*/
      }
    },
    created() {
      this.hangEvent()
    }
  }
</script>