<template>
    <div>
        <div class="row justify-content-center">
            <div v-if="repositories" class="col-md-8">
                <ul>
                    <li v-for='repository in repositories'>
                        <div>
                          <b-card
                            :title='repository.name'
                            :img-src='repository.avatar'
                            :img-alt='repository.name'
                            img-top
                            tag="article"
                            style="max-width: 20rem;"
                            class="mb-2"
                          >
                            <b-card-text>
                              {{ repository.description }}
                            </b-card-text>

                            <b-button :href='repository.url' variant="primary">View</b-button>
                          </b-card>
                        </div>
                    </li>
                </ul>
            </div>
            <div v-else>
                <b-button @click="getStarredRepos" variant="primary">Get Starred Repos</b-button>
            </div>
        </div>
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

        methods: {
            async getStarredRepos() {
                try {
                    const { response } = await axios.post('/repos')

                    console.log(response)
                } catch ({ response }) {
                   // toast message
                   console.log(response.error)
                }
            }
        }
    }
</script>
