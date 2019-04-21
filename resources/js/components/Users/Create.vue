<template>
  <div>
    <h1 class="font-normal text-3xl text-grey-darkest leading-none">
      Create User
    </h1>
    
    <hr>
    
    <form @submit="create" action="http://localhost:8000/api/users" class="w-full max-w-md">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label for="username" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Username
          </label>
          <input v-model="user.username" id="username" name="username" type="text" placeholder="Username" :class="errors.username ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.username">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
        
        <div class="w-full md:w-1/2 px-3">
          <label for="email" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Email
          </label>
          <input v-model="user.email" id="email" name="email" type="text" placeholder="user@mail.com" :class="errors.email ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.email">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
      </div>
      
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label for="user_roles_id" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Role
          </label>
          <div class="relative">
            <select v-model="user.user_roles_id" id="user_roles_id" name="user_roles_id" :class="errors.user_roles_id ? 'border-red':''" class="bg-white block appearance-none w-full border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-grey">
              <option selected disabled value="">Please select one</option>
              <option value="1">Admin</option>
              <option value="2">Publisher</option>
              <option value="3">Public User</option>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          <div v-for="error in errors.user_roles_id">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label for="address" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Address
          </label>
          <input v-model="user.address" id="address" name="address" type="text" placeholder="123 Fake Street" :class="errors.address ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.address">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label for="city" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            City
          </label>
          <input v-model="user.city" id="city" name="city" type="text" placeholder="Ottawa" :class="errors.city ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.city">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
        <div for="province" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Province
          </label>
          <input v-model="user.province" id="province" name="province" type="text" placeholder="Ontario" :class="errors.province ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.province">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <label for="postal_code" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Postal Code
          </label>
          <input v-model="user.postal_code" id="postal_code" name="postal_code" type="text" placeholder="A1A 1A1" :class="errors.postal_code ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.postal_code">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label for="country" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Country
          </label>
          <input v-model="user.country" id="country" name="country" type="text" placeholder="Canada" :class="errors.country ? 'border-red':''" class="appearance-none block w-full text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-grey">
          <div v-for="error in errors.country">
            <p class="text-red text-xs italic">{{ error }}</p>
          </div>
        </div>
      </div>
      
      <div class="flex justify-between items-center">
        <input type="submit" name="commit" value="Create User" class="bg-blue hover:bg-blue-dark text-white font-normal py-2 px-4 rounded">
        <hr>
        <a href="#" @click="$router.go(-1)">Back</a>
      </div>
    </form>
  </div>
</template>

<script>
    export default {
      props: ['id'],
      data() {
        return {
          user: { user_roles_id: '' },
          errors: []
        };
      },
      methods: {
        create(e) {
          e.preventDefault();
          let url = e.target.getAttribute('action');
          axios.post(url, this.user)
          .then(res => res.data)
          .then(data => this.$router.push("/"))
          .catch(error => this.errors = error.response.data.errors);
        }
      }
    }
</script>
