<template>
  <div>
    <h1 class="font-normal text-3xl text-grey-darkest leading-none">
      Show User {{ id }}
    </h1>
    
    <hr>
    
    <ul v-for="(val, key) in user" class="list-reset">
      <li class="py-2">
        <strong class="uppercase">{{ key }}:</strong> {{ val }}
      </li>
    </ul>
    
    <hr>
    
    <a href="#" @click="$router.go(-1)">Back</a>
  </div>
</template>

<script>
    export default {
      props: ['id'],
      data() {
        return { 
          user: { 
            id: null, 
            user_roles_id: null,
            username: null, 
            email: null, 
            created_at: null, 
            updated_at: null, 
            role_name: null,
            address: null,
            province: null,
            city: null,
            country: null,
            postal_code: null
          }
        };
      },
      created() {
        axios.get(`http://localhost:8000/api/users/${this.$props.id}`)
        .then(res => res.data)
        .then(data => this.user = data);
      },
    }
</script>
