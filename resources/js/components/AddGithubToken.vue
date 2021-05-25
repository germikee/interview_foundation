<template>
  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Store your token
      </h3>
      <div class="mt-2 max-w-xl text-sm text-gray-500">
        <b-link target="_blank" href="https://docs.github.com/en/github/authenticating-to-github/keeping-your-account-and-data-secure/creating-a-personal-access-token">
            No Token? Click here to learn how to make your personal access token from Github
        </b-link>
      </div>
      <form class="mt-5 sm:flex sm:items-center">
        <div class="w-full sm:max-w-xs">
          <input v-model="token" type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 p-2 mt-3 sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" />
        </div>
        <button @click="addGithubToken" type="submit" class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Save <b-spinner small v-if='loading' label="Loading..." ></b-spinner>
        </button>
      </form>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                token: '',
                loading: false,
            }
        },

        methods: {
            async addGithubToken() {
                this.loading = true

                try {
                    const { response } = await axios.post('/token', { token : this.token })

                    this.loading = false

                    window.location.reload()
                } catch ({ response }) {
                   // toast message
                   console.log(response.error)
                }
            }
        }
    }
</script>
