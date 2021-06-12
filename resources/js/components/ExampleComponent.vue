<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <v-alert
                v-if="alert"
                type="success"
                elevation="6"
                dismissible
                >Successfully uploaded
                </v-alert>
                <v-form
                ref="form"
                lazy-validation
            >
                <v-text-field
                v-model="name"
                label="Name"
                required
                :error-messages="errors.name"
                ></v-text-field>

                <v-file-input
                    v-model="imageFile"
                    show-size
                    accept="image/*"
                    label="Select Image"
                    :error-messages="errors.image"
                ></v-file-input>

                <v-btn
                    color="error"
                    class="mr-4"
                    @click="submit"
                >
                    Submit
                </v-btn>

                </v-form>

                <v-btn 
                    v-if="showLink"
                    icon :href="link" target="_blank">
                    <v-icon>link</v-icon>{{link ? link : 'The link will appear here'}}
                </v-btn>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ExampleComponent',
        data () {
        return {
            alert: false,
            name: '',
            imageFile: null,
            errors: [],
            link: '',
            showLink: false,
        }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            submit() {
                //create formData and append name and image
                let formData = new FormData()
                formData.append('name', this.name)
                formData.append('image', this.imageFile)
                formData.append("headers",{
                    "Content-Type": "multipart/form-data"
                })

                //post the data to the api endpoint
                axios.post('/api/carSubmit', formData)
                .then((response) => {
                    this.link = response.data.link
                    this.showLink = true
                    console.log('form submitted', response.status);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                    console.log(error.response);
                })
            }
        }
    }
</script>
