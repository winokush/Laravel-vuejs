<template>

    <div>

        <!-- Form -->
        <form class="text-center" style="color: #757575;" @submit.prevent="submitComment">
            <div class="mb-3">
                <h3 class="text-sm-left font-weight-normal">Comment</h3>
                <p class="note note-info" v-if="respondTo">
                    <button type="button" class="close right" aria-label="Close" @click="$emit('cancel-respond-to')">
                        <span aria-hidden="true">×</span>
                    </button>
                    En réponse à <span class="font-weight-bold blue-text">{{ respondTo.name }}</span> : <br><span class="text-muted">{{ respondTo.body }}</span>
                </p>
            </div>

            <div class="md-form form-sm mb-3">
                <input type="text" id="forminput" class="form-control form-control-sm" :class="{'is-invalid': errors.name}" v-model="form.name">
                <label for="forminput">Your name !</label>
                <div class="invalid-feedback" v-if="errors.name" v-text="errors.name[0]"></div>
            </div>

            <!--Textarea with icon prefix form-group shadow-textarea-->
            <div class="md-form amber-textarea active-amber-textarea-2 mb-3">
                <textarea id="formarea" class="md-textarea form-control z-depth-1" rows="3" :class="{'is-invalid': errors.body}" v-model="form.body"></textarea>
                <label for="formarea">Write your comment here !</label>
                <div class="invalid-feedback" v-if="errors.body" v-text="errors.body[0]"></div>
            </div>



            <!-- Sign in button -->
            <button type="submit" class="btn btn-outline-info rounded-pill waves-effect">Comments</button>

        </form>
        <!-- Form -->

    </div>

</template>

<script>
    export default {
        props: ['respondTo'],
        data () {
            return {
                form: {
                    name: '',
                    body: '',
                    url: window.location.href
                },
                errors: {},
            }
        },
        methods: {
            submitComment () {
                axios.post('/comments', this.fullForm)
                    .then(({ data }) => {
                        this.$emit('newComment', data);
                        this.form.body ="";
                        this.errors = {};
                    }).catch(error => {
                    this.errors = error.response.data.errors;
                });
            },
        },
        computed: {
            fullForm () {
                if (this.respondTo) {
                   return {
                       ... this.form,
                       respond_to_id: this.respondTo.id
                   }
                }

                return this.form;
            }
        }
    }
</script>