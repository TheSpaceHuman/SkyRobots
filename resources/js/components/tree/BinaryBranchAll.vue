<template>
  <div class="container">
    <div
      class="row"
      v-for="(row,i) in users"
      :key="i"
    >
      <div
        v-for="user in row"
        :key="user.id"
      >
        <div
          class="card referral-tree__card"
          :class="{
            'current': user.id == userId,
            'parent': user.id == parentId.binary,
          }"
        >
          <div class="referral-tree__card__img">
            <img :src="`/storage/${user.avatar}`" :alt="user.name">
          </div>
          <div class="card-title referral-tree__card__title">{{ user.name }}</div>
          <div class="card-body referral-tree__card__body">
            <div class="referral-tree__card__body__id"># {{ user.id }}</div>
            <div
              class="referral-tree__card__body__status"
              :class="user['activated_to'] ? 'active' : 'not-active'"
            >
              {{ user['activated_to'] ? 'Активный' : 'Неактивный' }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'BinaryBranchAll',
    props: {
      users: {
        required: true
      },
      userId: {
        required: true
      },
      parentId: {
        default: false
      }
    },
    data() {
      return {

      }
    }
  }
</script>

<style lang="scss">

</style>