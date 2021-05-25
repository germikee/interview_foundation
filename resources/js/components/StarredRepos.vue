<template>
    <div v-if="repositories.length">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div v-for="repository in repositories" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" :src="repository.avatar" alt="" />
                </div>
                <div class="flex-1 min-w-0">
                    <a :href="repository.url" class="no-underline" target="_blank">
                        <span class="absolute inset-0" aria-hidden="true" />
                        <p class="text-sm font-medium text-gray-900">
                            {{ repository.name }}
                        </p>
                        <p class="text-sm text-gray-500 break-words">
                            {{ repository.description }}
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <button @click="getStarredRepos" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Retrieve Starred Repositories <b-spinner small v-if='loading' class="mx-2" label="Loading..." ></b-spinner>
        </button>
    </div>
</template>

<script>
    export default {
        props: {
            token: {
                type: String,
                default: ''
            },
            repositories: {
                type: Array,
                default: {}
            }
        },

        data() {
            return {
                loading: false
            }
        },

        methods: {
            async getStarredRepos() {
                this.loading = true

                try {
                    const { response } = await axios.post('/repos')

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
