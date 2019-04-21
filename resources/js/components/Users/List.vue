<template>
  <div>
    <h1 class="font-normal text-3xl text-grey-darkest leading-none mb-8">
        Users List
        <span class="text-base float-right">
          <router-link :to="{ name: 'createUser'}"
                       class="bg-blue hover:bg-blue-dark text-white font-normal py-2 px-4 rounded">
            Create User
          </router-link>
        </span>
    </h1>
    
    <hr>
    
    <table class="table table-auto">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr scope="row" v-for="user in users">
          <td v-text="user.id"></td>
          <td v-text="user.username"></td>
          <td v-text="user.email"></td>
          <td v-text="user.role_name"></td>
          <td class="min">
            <div class="inline-flex text-xs">
                <router-link :to="{ name: 'showUser', params: { id: user.id }}"
                             class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded-l">
                  Show
                </router-link>
                <router-link :to="{ name: 'editUser', params: { id: user.id }}"
                             class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent"
                             style="border-right: none;border-left: none;">
                  Edit
                </router-link>
                
                <a @click="destroy" :href= "`/api/users/${user.id}`"
                    class="bg-transparent hover:bg-red text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded-r">
                  Delete
                </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
    export default {
      data() {
        return { users: [] };
      },
      created() {
        axios.get('http://localhost:8000/api/users')
        .then(res => res.data)
        .then(data => {
          this.message = '';
          this.users = data;
        })
        .catch(error => {
          this.users = [];
          this.message = error.response.data.message;
        });
      },
      methods: {
        destroy(e) {
          e.preventDefault();
          let confirm_msg = "Are you sure you want to permanently remove this user?";

          if (confirm(confirm_msg)) {
            let url = e.target.getAttribute("href");
            axios.delete(url)
            .then(res => res.data)
            .then(data => {
              this.users.splice(this.users.indexOf(data), 1)
            })
            .catch(error => {
              this.achievements = [];
              this.message = error.response.data.message;
            });
          }
        }
      }
    }
</script>
