<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6 offset-md-1">
                <!-- Material form subscription -->
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Disqus</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body pr-lg-8">

                        <div class="border-bottom p-4 mb-2">

                             <comment class="mb-4"
                                      v-for="comment in comments"
                                      :key="comment.id"
                                      :comment="comment"
                                      @respond-to="respondTo = $event"
                             ></comment>

                            <div v-if="nextPage" class="d-flex justify-content-center">
                                <button type="button" class="btn rounded-pill btn-outline-info contour" @click="fetchComments(nextPage)">
                                    <i class="fas fa-angle-double-right"></i>
                                    <span class="remaining font-weight-bold">{{ numberOfComments - comments.length }} remaining</span>
                                </button>
                            </div>

                        </div>

                        <comment-form
                                @newComment="newComment"
                                :respond-to="respondTo"
                                @cancel-respond-to="respondTo = null"
                        ></comment-form>

                    </div>

                </div>
                <!-- Material form subscription -->
            </div>

        </div>
    </div>
</template>

<script>
import CommentForm from './CommentForm.vue'
import Comment from './Comment.vue'

    export default {
    components: { CommentForm, Comment },
//        props: ['dataComments'],
        data () {
            return {
                comments: [],
                respondTo: null,
                nextPage: null,
                numberOfComments: 0
//                now: new Date ()
                //                comments: this.dataComments
            }
        },
        mounted () {

//            setInterval(() => {
//                this.now = new Date ();
//            },1000);
            let test = this.fetchComments('/comments/' + btoa(window.location.href));
        },
        methods: {
        fetchComments (url) {
            axios.get(url)
                .then(({data: pagination}) => {
//                    console.log(pagination);
                    this.comments = this.comments.concat(pagination.data);
                    this.nextPage = pagination.next_page_url;
                    this.numberOfComments = pagination.total;
                });
        },
            newComment (comment) {

                if (! this.respondTo) {
                    this.comments.push(comment);
                    return
                }

                this.respondTo.children.push(comment);
            }
      }
    }
</script>


<style scoped>
    .remaining {
        color: #e83e8c;
    }
</style>